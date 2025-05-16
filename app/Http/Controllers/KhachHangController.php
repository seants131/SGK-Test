<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index()
    {
        $khachhangs = KhachHang::paginate(10);
        return view('admin.khachhang.index', compact('khachhangs'));
    }

    public function create()
    {
        return view('admin.khachhang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|unique:khachhang,email',
        ]);

        KhachHang::create($request->all());

        return redirect()->route('admin.khachhang.index')->with('success', 'Thêm khách hàng thành công!');
    }

    public function edit(KhachHang $khachhang)
    {
        return view('admin.khachhang.edit', compact('khachhang'));
    }

    public function update(Request $request, KhachHang $khachhang)
    {
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|unique:khachhang,email,' . $khachhang->id,
        ]);

        $khachhang->update($request->all());

        return redirect()->route('admin.khachhang.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(KhachHang $khachhang)
    {
        $khachhang->delete();
        return redirect()->route('admin.khachhang.index')->with('success', 'Xóa thành công!');
    }
}


