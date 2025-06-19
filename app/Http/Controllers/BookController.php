<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Sach::query();

        if ($request->filled('ten_sach')) {
            $query->where('TenSach', 'LIKE', '%' . $request->ten_sach . '%');
        }

        if ($request->filled('tac_gia')) {
            $tacGia = trim($request->tac_gia);
            $query->whereRaw("LOWER(TacGia) LIKE ?", ['%' . strtolower($tacGia) . '%']);
        }

        if ($request->filled('ngay_tao')) {
            $query->whereDate('created_at', $request->ngay_tao);
        }

        $books = $query->orderBy('created_at', 'desc')->paginate(10);
        $lopOptions = ['1','2','3','4','5','6','7','8','9','10','11','12'];

        return view('admin.books.index', compact('books', 'lopOptions'));
    }

    public function show($id)
    {
        $book = Sach::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    public function create()
    {
        $lopOptions = ['1','2','3','4','5','6','7','8','9','10','11','12'];
        return view('admin.books.create', compact('lopOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'TenSach' => 'required|string|max:255|unique:sach,TenSach',
            'LoaiSanPham' => 'required|in:sach_giao_khoa,sach_tham_khao',
            'Lop' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'TacGia' => 'nullable|string|max:255',
            'GiaBia' => 'required|numeric',
            // ❌ Không còn validate SoLuong ở đây
            'LuotMua' => 'nullable|integer|min:0',
            'NamXuatBan' => 'required|integer',
            'MoTa' => 'nullable|string',
            'TrangThai' => 'required|boolean',
            'MaNXB' => 'nullable|string',
            'HinhAnh' => 'nullable|image|max:2048',
        ], [
            'TenSach.unique' => 'Tên sách này đã tồn tại.',
        ]);

        $data = $request->except('SoLuong'); // Không nhận số lượng từ form
        $data['SoLuong'] = 0; // Mặc định là 0 khi tạo mới
        $data['created_at'] = now();

        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/books'), $fileName);
            $data['HinhAnh'] = $fileName;
        }

        Sach::create($data);

        return redirect()->route('admin.books.index')->with('success', 'Sách đã được thêm thành công.');
    }

    public function edit($id)
    {
        $book = Sach::findOrFail($id);
        $lopOptions = ['1','2','3','4','5','6','7','8','9','10','11','12'];
        return view('admin.books.edit', compact('book', 'lopOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenSach' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sach', 'TenSach')->ignore($id, 'MaSach')
            ],
            'LoaiSanPham' => 'required|in:sach_giao_khoa,sach_tham_khao',
            'Lop' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'TacGia' => 'nullable|string|max:255',
            'GiaBia' => 'required|numeric',
            // ❌ Không validate SoLuong
            'LuotMua' => 'nullable|integer|min:0',
            'NamXuatBan' => 'required|integer',
            'MoTa' => 'nullable|string',
            'TrangThai' => 'required|boolean',
            'MaNXB' => 'nullable|string',
            'HinhAnh' => 'nullable|image|max:2048',
        ], [
            'TenSach.unique' => 'Tên sách này đã tồn tại.',
        ]);

        $book = Sach::findOrFail($id);
        $data = $request->except('SoLuong'); // Không sửa số lượng thủ công

        if ($request->hasFile('HinhAnh')) {
            if ($book->HinhAnh && file_exists(public_path('uploads/books/' . $book->HinhAnh))) {
                unlink(public_path('uploads/books/' . $book->HinhAnh));
            }

            $file = $request->file('HinhAnh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/books'), $fileName);
            $data['HinhAnh'] = $fileName;
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Sách đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $book = Sach::findOrFail($id);

        try {
            if ($book->HinhAnh && file_exists(public_path('uploads/books/' . $book->HinhAnh))) {
                unlink(public_path('uploads/books/' . $book->HinhAnh));
            }

            $book->delete();
            return redirect()->route('admin.books.index')->with('success', 'Sách đã được xóa thành công.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === "23000") {
                return redirect()->route('admin.books.index')->with(
                    'error',
                    "Không thể xóa sách này vì nó đang được sử dụng trong các hóa đơn mua hàng hoặc phiếu nhập."
                );
            }

            return redirect()->route('admin.books.index')->with(
                'error',
                'Đã xảy ra lỗi khi xóa sách. Vui lòng thử lại hoặc liên hệ với quản trị viên.'
            );
        }
    }
}
