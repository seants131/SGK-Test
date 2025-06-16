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
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:nguoi_dung,username',
            'email' => 'required|email|unique:nguoi_dung,email',
            'password' => 'required|string|min:6|confirmed',
            'so_dien_thoai' => 'required|string|unique:nguoi_dung,so_dien_thoai',
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:nguoi_dung,username,' . $khachhang->id,
            'email' => 'required|email|unique:nguoi_dung,email,' . $khachhang->id,
            'so_dien_thoai' => 'required|string|unique:nguoi_dung,so_dien_thoai,' . $khachhang->id,
        ]);

        $data = $request->only(['name', 'username', 'email', 'so_dien_thoai']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $khachhang->update($data);

        return redirect()->route('admin.khachhang.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(KhachHang $khachhang)
    {
        $khachhang->delete();
        return redirect()->route('admin.khachhang.index')->with('success', 'Xóa thành công!');
    }
}


