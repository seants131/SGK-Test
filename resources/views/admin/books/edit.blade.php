@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Cập nhật sách</h4>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.books.update', $book->MaSach) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <a href="{{ route('admin.books.index') }}" class="close-form-button" title="Đóng">&times;</a>

                        <div class="form-group">
                            <label for="HinhAnh">Hình ảnh mới:</label>
                            <input type="file" name="HinhAnh" id="HinhAnh" accept="image/*" >
                        </div>

                        @if ($book->HinhAnh)
                            <div class="form-group">
                                <label>Hình ảnh hiện tại:</label><br>
                                <img src="{{ asset('uploads/books/' . $book->HinhAnh) }}" alt="Ảnh sách" width="120">
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="TenSach">Tên sách:</label>
                            <input type="text" name="TenSach" id="TenSach" class="form-control" value="{{ old('TenSach', $book->TenSach) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="LoaiSanPham">Loại sản phẩm:</label>
                            <select name="LoaiSanPham" id="LoaiSanPham" class="form-control" required>
                                <option value="">-- Chọn loại sản phẩm --</option>
                                <option value="sach_giao_khoa" {{ old('LoaiSanPham', $book->LoaiSanPham) == 'sach_giao_khoa' ? 'selected' : '' }}>Sách giáo khoa</option>
                                <option value="sach_tham_khao" {{ old('LoaiSanPham', $book->LoaiSanPham) == 'sach_tham_khao' ? 'selected' : '' }}>Sách tham khảo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Lop">Lớp:</label>
                            <select name="Lop" id="Lop" required>
                                <option value="">Chọn lớp</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ old('Lop', $book->Lop) == $i ? 'selected' : '' }}>Lớp {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="TacGia">Tác Giả:</label>
                            <input type="text" name="TacGia" id="TacGia" class="form-control" value="{{ old('TacGia', $book->TacGia) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="GiaBia">Giá bìa:</label>
                            <input type="number" step="0.01" name="GiaBia" id="GiaBia" class="form-control" value="{{ old('GiaBia', $book->GiaBia) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="LuotMua">Lượt mua:</label>
                            <input type="number" name="LuotMua" id="LuotMua" class="form-control" value="{{ old('LuotMua', $book->LuotMua ?? 0) }}" min="0" required>
                        </div>

                        <div class="form-group">
                            <label for="NamXuatBan">Năm xuất bản:</label>
                            <input type="number" name="NamXuatBan" id="NamXuatBan" class="form-control" min="1900" max="{{ date('Y') }}" value="{{ old('NamXuatBan', $book->NamXuatBan) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="MoTa">Mô tả:</label>
                            <textarea name="MoTa" id="MoTa" class="form-control" rows="4">{{ old('MoTa', $book->MoTa) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="TrangThai">Trạng thái:</label>
                            <select name="TrangThai" id="TrangThai" class="form-control" required>
                                <option value="1" {{ old('TrangThai', $book->TrangThai) == 1 ? 'selected' : '' }}>Còn hàng</option>
                                <option value="0" {{ old('TrangThai', $book->TrangThai) == 0 ? 'selected' : '' }}>Hết hàng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nha_xuat_ban_id">Nhà xuất bản:</label>
                            <select name="nha_xuat_ban_id" id="nha_xuat_ban_id" class="form-control" required>
                                <option value="">-- Chọn NXB --</option>
                                @foreach($nhaXuatBans as $nxb)
                                    <option value="{{ $nxb->id }}" {{ old('nha_xuat_ban_id', $book->nha_xuat_ban_id) == $nxb->id ? 'selected' : '' }}>
                                        {{ $nxb->ten }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between mt-4">
                            <div>
                            <button type="submit" class="btn btn-warning">Cập nhật sách</button>
                            </div>
                            <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">← Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .close-form-button {
        position: absolute;
        top: 15px;
        right: 20px;
        z-index: 10;
        background-color: #dc3545;
        color: white;
        font-size: 22px;
        font-weight: bold;
        line-height: 1;
        border: none;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .close-form-button:hover {
        background-color: #bd2130;
        text-decoration: none;
    }

    form {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 1250px;
        box-sizing: border-box;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        height: 120px;
        resize: vertical;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }

    button:hover {
        background-color: rgb(21, 206, 86);
    }

    h1.text-center {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }
</style>
@endsection
