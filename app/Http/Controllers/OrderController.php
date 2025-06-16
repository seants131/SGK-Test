<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang; // hoặc HoaDon nếu bạn đổi tên class/model
use App\Models\KhachHang;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = DonHang::with('KhachHang');

        if ($request->filled('ma_don')) {
            $query->where('id', 'like', '%' . $request->ma_don . '%');
        }

        if ($request->filled('khach_hang')) {
            $query->whereHas('KhachHang', function ($q) use ($request) {
                $q->where('ho_ten', 'like', '%' . $request->khach_hang . '%');
            });
        }

        $orders = $query->paginate(5);
        $customers = KhachHang::all(); // hoặc chỉ lấy role là KH nếu cần lọc

        return view('admin.orders.index', compact('orders', 'customers'));
    }

    public function show($id)
    {
        $order = DonHang::with('KhachHang')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function create()
    {
        $customers = KhachHang::all();
        return view('admin.orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:nguoi_dung,id',
            'ngay_mua' => 'required|date',
            'tong_tien' => 'required|numeric|min:0',
            'tong_so_luong' => 'required|integer|min:0',
            'trang_thai' => ['required', Rule::in(['cho_xu_ly', 'dang_giao', 'hoan_thanh', 'huy'])],
            'hinh_thuc_thanh_toan' => ['required', Rule::in(['tien_mat', 'chuyen_khoan'])],
        ]);

        DonHang::create($request->only([
            'user_id', 'ngay_mua', 'trang_thai', 'hinh_thuc_thanh_toan', 'giam_gia', 'tong_tien', 'tong_so_luong', 'khuyen_mai_id'
        ]));

        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được tạo thành công.');
    }

    public function edit($id)
    {
        $order = DonHang::findOrFail($id);
        $customers = KhachHang::all();
        return view('admin.orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:nguoi_dung,id',
            'ngay_mua' => 'required|date',
            'tong_tien' => 'required|numeric|min:0',
            'tong_so_luong' => 'required|integer|min:0',
            'trang_thai' => ['required', Rule::in(['cho_xu_ly', 'dang_giao', 'hoan_thanh', 'huy'])],
            'hinh_thuc_thanh_toan' => ['required', Rule::in(['tien_mat', 'chuyen_khoan'])],
        ]);

        $order = DonHang::findOrFail($id);
        $order->update($request->only([
            'user_id', 'ngay_mua', 'trang_thai', 'hinh_thuc_thanh_toan', 'giam_gia', 'tong_tien', 'tong_so_luong', 'khuyen_mai_id'
        ]));

        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $order = DonHang::findOrFail($id);

        try {
            $order->delete();
            return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được xóa thành công.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('admin.orders.index')->with('error', 'Xảy ra lỗi khi xóa đơn hàng.');
        }
    }
}
