<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;  // Model Sach để thao tác với bảng sách
use App\Models\DanhMuc; // Model DanhMuc để thao tác với bảng danh mục
use Illuminate\Validation\Rule; //validate

class BookController extends Controller
{
    public function index()
    {
        $books = Sach::with('category')->orderBy('created_at', 'desc')->paginate(10); // Sử dụng 'category' thay vì 'DanhMuc'
        return view('admin.books.index', compact('books'));
    }
    
    public function create()
    {
        $categories = DanhMuc::all(); // Lấy tất cả danh mục
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'TenSach' => 'required|string|max:255|unique:Sach,TenSach',  // Kiểm tra tên sách có trùng không
            'category_id' => 'required|exists:danhmuc,id',  // Kiểm tra danh mục có tồn tại không
            'GiaNhap' => 'required|numeric',  // Kiểm tra giá nhập là số
            'GiaBan' => 'required|numeric',  // Kiểm tra giá bán là số
            'SoLuong' => 'required|integer',  // Kiểm tra số lượng là số nguyên
            'NamXuatBan' => 'required|integer',  // Kiểm tra năm xuất bản là số nguyên
            'MoTa' => 'nullable|string',  // Mô tả không bắt buộc
            'TrangThai' => 'required|boolean',  // Trạng thái phải là true/false
            'MaNXB' => 'nullable|string',  // Mã nhà xuất bản không bắt buộc
            'HinhAnh' => 'nullable|image|max:2048',  // Hình ảnh không bắt buộc và có giới hạn dung lượng
        ], [
            // Tùy chỉnh thông báo lỗi cho trường 'TenSach'
            'TenSach.unique' => 'Tên sách này đã tồn tại. Vui lòng chọn tên khác.',
        ]);
    
        // Lấy dữ liệu từ form
        $data = $request->all();
        $data['created_at'] = now(); // Đặt thời gian tạo là hiện tại
    
        // Kiểm tra và xử lý hình ảnh nếu có
        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/books'), $fileName);
            $data['HinhAnh'] = $fileName;
        }
    
        // Tạo sách mới mà không cần thêm MaSach, vì MaSach sẽ tự động tăng
        Sach::create($data);
    
        return redirect()->route('admin.books.index')->with('success', 'Sách đã được thêm thành công.');
    }
    

    public function edit($id)
    {
        $book = Sach::findOrFail($id);
        $categories = DanhMuc::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenSach' => [
                'required',
                'string',
                'max:255',
                Rule::unique('Sach', 'TenSach')->ignore($id, 'MaSach') // Sử dụng Rule::unique để chỉ định khóa chính
            ],  // Kiểm tra tên sách có trùng không
        'category_id' => 'required|exists:danhmuc,id',  // Kiểm tra danh mục có tồn tại không
        'GiaNhap' => 'required|numeric',  // Kiểm tra giá nhập là số
        'GiaBan' => 'required|numeric',  // Kiểm tra giá bán là số
        'SoLuong' => 'required|integer',  // Kiểm tra số lượng là số nguyên
        'NamXuatBan' => 'required|integer',  // Kiểm tra năm xuất bản là số nguyên
        'MoTa' => 'nullable|string',  // Mô tả không bắt buộc
        'TrangThai' => 'required|boolean',  // Trạng thái phải là true/false
        'MaNXB' => 'nullable|string',  // Mã nhà xuất bản không bắt buộc
        'HinhAnh' => 'nullable|image|max:2048',  // Hình ảnh không bắt buộc và có giới hạn dung lượng
        ], [
            // Tùy chỉnh thông báo lỗi cho trường 'TenSach'
            'TenSach.unique' => 'Tên sách này đã tồn tại. Vui lòng chọn tên khác.',
            'MaSach.unique' => 'Mã sách đã tồn tại.',
        ]);

        $book = Sach::findOrFail($id);
        $data = $request->all();

    if ($request->hasFile('HinhAnh')) {
        // Xóa hình ảnh cũ nếu có
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
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Sách đã được xóa thành công.');
    } catch (\Illuminate\Database\QueryException $e) {
        if ($e->getCode() === "23000") { // Mã lỗi cho ràng buộc khóa ngoại
            return redirect()->route('admin.books.index')->with(
                'error', 
                "Không thể xóa sách này vì nó đang được sử dụng trong các hóa đơn mua hàng. Hãy kiểm tra và xóa các hóa đơn liên quan trước khi xóa sách."
            );
        }

        // Đối với các lỗi khác
        return redirect()->route('admin.books.index')->with(
            'error', 
            'Đã xảy ra lỗi khi xóa sách. Vui lòng thử lại hoặc liên hệ với quản trị viên.'
        );
    }
}
}
