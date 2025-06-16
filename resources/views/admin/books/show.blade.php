@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Chi tiết sách</h4>
                        </div>
                        <a href="{{ route('admin.books.index') }}" class="btn btn-sm btn-secondary">← Quay lại danh sách</a>
                    </div>
                    <div class="iq-card-body">
                        <div class="row">
                            <!-- Hình ảnh -->
                            <div class="col-md-4 text-center mb-3">
                                @if ($book->HinhAnh)
                                    <img src="{{ asset('uploads/books/' . $book->HinhAnh) }}" alt="Hình ảnh sách" class="img-fluid rounded shadow-sm" style="max-height: 500px;">
                                @else
                                    <p class="text-muted">Không có hình ảnh</p>
                                @endif
                            </div>

                            <!-- Thông tin sách -->
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 200px;">Mã sách</th>
                                        <td>{{ $book->MaSach }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tên sách</th>
                                        <td>{{ $book->TenSach }}</td>
                                    </tr>
                                    <tr>
                                        <th>Slug</th>
                                        <td>{{ $book->slug }}</td>
                                    </tr>
                                    <tr>
                                        <th>Loại sản phẩm</th>
                                        <td>
                                            @if($book->LoaiSanPham == 'sach_giao_khoa')
                                                Sách giáo khoa
                                            @elseif($book->LoaiSanPham == 'sach_tham_khao')
                                                Sách tham khảo
                                            @else
                                                Không xác định
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lớp</th>
                                        <td>{{ $book->Lop ? 'Lớp ' . $book->Lop : 'Không xác định' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tác Giả</th>
                                        <td>{{ $book->TacGia }}</td>
                                    </tr>
                                    <tr>
                                        <th>Giá bìa</th>
                                        <td>{{ number_format($book->GiaBia, 0, ',', '.') }} đ</td>
                                    </tr>
                                    <tr>
                                        <th>Số lượng</th>
                                        <td>{{ $book->SoLuong }}</td>
                                    </tr>
                                    <tr>
                                        <th>Năm xuất bản</th>
                                        <td>{{ $book->NamXuatBan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mô tả</th>
                                        <td>{{ $book->MoTa }}</td>
                                    </tr>
                                    <tr>
                                        <th>Trạng thái</th>
                                        <td>
                                            @if($book->TrangThai == 1)
                                                <span class="badge badge-success">Còn hàng</span>
                                            @else
                                                <span class="badge badge-danger">Hết hàng</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nhà xuất bản (NXB)</th>
                                        <td>{{ $book->NXB ?? 'Không có' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lượt mua</th>
                                        <td>{{ $book->LuotMua }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày tạo</th>
                                        <td>{{ $book->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày cập nhật</th>
                                        <td>{{ $book->updated_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="text-right mt-4">
                            <a href="{{ route('admin.books.edit', $book->MaSach) }}" class="btn btn-warning">✏️ Sửa sách</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
