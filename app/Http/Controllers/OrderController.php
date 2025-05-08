<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\Sach;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = DonHang::query();

        if ($request->filled('ma_don')) {
            $query->where('id', 'like', '%' . $request->ma_don . '%');
        }
    
        if ($request->filled('khach_hang')) {
            $query->whereHas('khachHang', function ($q) use ($request) {
                $q->where('ho_ten', 'like', '%' . $request->khach_hang . '%');
            });
        }
    
        $orders = $query->paginate(3);
        $customers = KhachHang::all();

        return view('admin.orders.index', compact('orders', 'customers'));
    }

    public function show($id)
    {
        $order = DonHang::with('khachHang')->findOrFail($id);
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
            'khach_hang_id' => 'required|exists:khachhang,id',
            'ngay_dat' => 'required|date',
            'tong_tien' => 'required|numeric|min:0',
            'trang_thai' => ['required', Rule::in(['Cho xu ly', 'Dang giao', 'Hoan thanh', 'Huy'])],
        ]);

        DonHang::create([
            'khach_hang_id' => $request->khach_hang_id,
            'ngay_dat' => $request->ngay_dat,
            'tong_tien' => $request->tong_tien,
            'trang_thai' => $request->trang_thai,
        ]);

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
            'khach_hang_id' => 'required|exists:khachhang,id',
            'ngay_dat' => 'required|date',
            'tong_tien' => 'required|numeric|min:0',
            'trang_thai' => ['required', Rule::in(['Cho xu ly', 'Dang giao', 'Hoan thanh', 'Huy'])],
        ]);

        $order = DonHang::findOrFail($id);
        $order->update([
            'khach_hang_id' => $request->khach_hang_id,
            'ngay_dat' => $request->ngay_dat,
            'tong_tien' => $request->tong_tien,
            'trang_thai' => $request->trang_thai,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $order = DonHang::findOrFail($id);

        try {
            $order->delete();
            return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được xóa thành công.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('admin.orders.index')->with('error', 'Đã xảy ra lỗi khi xóa đơn hàng. Vui lòng thử lại hoặc liên hệ với quản trị viên.');
        }
    }
}
