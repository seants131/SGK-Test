<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuNhap;
use App\Models\ChiTietNhapSach;
use App\Models\Sach;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;

class PhieuNhapController extends Controller
{
   public function index(Request $request)
{
    $query = PhieuNhap::with('khachHang'); // <-- thêm eager loading ở đây

    if ($request->filled('ho_ten')) {
        $query->whereHas('khachHang', function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->ho_ten . '%'); // sửa ho_ten -> name vì cột trong DB là 'name'
        });
    }

    if ($request->filled('ngay_nhap')) {
        $query->whereDate('ngay_nhap', $request->ngay_nhap);
    }

    $phieunhaps = $query->orderBy('ngay_nhap', 'desc')->paginate(10);

    return view('admin.phieunhap.index', compact('phieunhaps'));
}



    public function create()
    {
        $sachs = Sach::all();
        return view('admin.phieunhap.create', compact('sachs'));
    }

   public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để tạo phiếu nhập.');
        }

        $userId = Auth::id();

        if (!\App\Models\KhachHang::find($userId)) {
            return redirect()->back()->with('error', 'Không tìm thấy người dùng tương ứng trong hệ thống , kiểm tra xem người dùng có tồn tại không.');
        }

        $request->validate([
            'ngay_nhap' => 'required|date',
            'sach_id.*' => 'required|exists:sach,MaSach',
            'so_luong.*' => 'required|integer|min:1',
        ]);

        try {
            $tong_so_luong = array_sum($request->so_luong);
            $tong_tien = 0;

            $phieuNhap = PhieuNhap::create([
                'user_id' => $userId,
                'ngay_nhap' => $request->ngay_nhap,
                'tong_so_luong' => $tong_so_luong,
                'tong_tien' => 0
            ]);

            foreach ($request->sach_id as $index => $sachId) {
                $sach = \App\Models\Sach::find($sachId);
                $soLuong = $request->so_luong[$index];
                $chietKhau = $request->chiet_khau[$index] ?? 0;

                $thanhTien = $sach->GiaBia * $soLuong * (1 - $chietKhau / 100);
                $tong_tien += $thanhTien;

                \App\Models\ChiTietNhapSach::create([
                    'phieu_nhap_id' => $phieuNhap->id,
                    'sach_id' => $sachId,
                    'so_luong' => $soLuong,
                    'chiet_khau' => $chietKhau,
                    'thanh_tien' => $thanhTien
                ]);

                $sach->SoLuong += $soLuong;
                $sach->save();
            }

            $phieuNhap->update(['tong_tien' => $tong_tien]);

            return redirect()->route('admin.phieunhap.index')->with('success', 'Tạo phiếu nhập thành công.');
        } catch (\Exception $e) {
            // Ghi log nếu cần: \Log::error($e);
            return redirect()->back()->withInput()->with('error', 'Lỗi khi tạo phiếu nhập: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $phieunhap = PhieuNhap::with(['chiTietNhapSach.sach', 'khachHang'])->findOrFail($id);
        return view('admin.phieunhap.show', compact('phieunhap'));
    }

    public function edit($id)
    {
        $phieunhap = PhieuNhap::with('chiTietNhapSach.sach')->findOrFail($id);
        $sachs = Sach::all();
        return view('admin.phieunhap.edit', compact('phieunhap', 'sachs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ngay_nhap' => 'required|date',
            'sach_id.*' => 'required|exists:sach,MaSach',
            'so_luong.*' => 'required|integer|min:1',
        ]);

        $phieuNhap = PhieuNhap::findOrFail($id);

        // Trừ tồn kho cũ
        foreach ($phieuNhap->chiTietNhapSach as $ct) {
            $sach = $ct->sach;
            $sach->SoLuong -= $ct->so_luong;
            $sach->save();
            $ct->delete();
        }

        $tong_so_luong = array_sum($request->so_luong);
        $tong_tien = 0;

        foreach ($request->sach_id as $index => $sachId) {
            $sach = Sach::find($sachId);
            $soLuong = $request->so_luong[$index];
            $chietKhau = $request->chiet_khau[$index] ?? 0;

            // ✅ Tính theo giá bìa
            $thanhTien = $sach->GiaBia * $soLuong * (1 - $chietKhau / 100);
            $tong_tien += $thanhTien;

            ChiTietNhapSach::create([
                'phieu_nhap_id' => $phieuNhap->id,
                'sach_id' => $sachId,
                'so_luong' => $soLuong,
                'chiet_khau' => $chietKhau,
                'thanh_tien' => $thanhTien
            ]);

            $sach->SoLuong += $soLuong;
            $sach->save();
        }

        $phieuNhap->update([
            'ngay_nhap' => $request->ngay_nhap,
            'tong_so_luong' => $tong_so_luong,
            'tong_tien' => $tong_tien,
        ]);

        return redirect()->route('admin.phieunhap.index')->with('success', 'Cập nhật phiếu nhập thành công.');
    }

    public function destroy($id)
    {
        $phieuNhap = PhieuNhap::findOrFail($id);

        foreach ($phieuNhap->chiTietNhapSach as $ct) {
            $sach = $ct->sach;
            $sach->SoLuong -= $ct->so_luong;
            $sach->save();
            $ct->delete();
        }

        $phieuNhap->delete();

        return back()->with('success', 'Đã xóa phiếu nhập và cập nhật tồn kho.');
    }
}
