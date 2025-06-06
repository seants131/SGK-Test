<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    /** Danh sách + tìm kiếm */
    public function index(Request $request)
    {
        $query = LienHe::query();

        // Tìm theo họ tên
        if ($request->filled('hoten')) {
            $query->where('hoten', 'LIKE', '%' . $request->hoten . '%');
        }

        // Tìm theo email
        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        // Tìm theo chủ đề
        if ($request->filled('chude')) {
            $query->where('chude', 'LIKE', '%' . $request->chude . '%');
        }

        // Tìm theo ngày tạo
        if ($request->filled('ngay_tao')) {
            $query->whereDate('created_at', $request->ngay_tao);
        }

        $lienhe = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.lienhe.index', compact('lienhe'));
    }

    /** Form tạo */
    public function create()
    {
        return view('admin.lienhe.create');
    }

    /** Lưu liên hệ mới */
    public function store(Request $request)
    {
        $request->validate([
            'hoten'   => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'chude'   => 'required|string|max:255',
            'noidung' => 'required|string',
        ]);

        LienHe::create($request->all());

        return redirect()->route('admin.lienhe.index')
                         ->with('success', 'Liên hệ đã được thêm thành công.');
    }

    /** Form chỉnh sửa */
    public function edit($id)
    {
        $contact = LienHe::findOrFail($id);
        return view('admin.lienhe.edit', compact('contact'));
    }

    /** Cập nhật */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hoten'   => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'chude'   => 'required|string|max:255',
            'noidung' => 'required|string',
        ]);

        $contact = LienHe::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('admin.lienhe.index')
                         ->with('success', 'Liên hệ đã được cập nhật thành công.');
    }

    /** Xóa */
    public function destroy($id)
    {
        LienHe::findOrFail($id)->delete();
        return redirect()->route('admin.lienhe.index')
                         ->with('success', 'Liên hệ đã được xóa thành công.');
    }
}
