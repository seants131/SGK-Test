@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Chi tiết phiếu nhập #{{ $phieunhap->id }}</h4>
                        </div>
                        <a href="{{ route('admin.phieunhap.index') }}" class="btn btn-sm btn-secondary">← Quay lại danh sách</a>
                    </div>

                    <div class="iq-card-body">

                        {{-- Thông tin chung --}}
                        <div class="card-header font-weight-bold text-center h5">Thông tin chung</div>
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">Ngày nhập</th>
                                        <td>{{ \Carbon\Carbon::parse($phieunhap->ngay_nhap)->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Người nhập</th>
                                        <td>{{ $phieunhap->khachHang->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng số lượng</th>
                                        <td>{{ number_format($phieunhap->tong_so_luong) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <td>{{ number_format($phieunhap->tong_tien, 0, ',', '.') }} đ</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày tạo</th>
                                        <td>{{ $phieunhap->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày cập nhật</th>
                                        <td>{{ $phieunhap->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- Chi tiết sách --}}
                        <div class="card-header font-weight-bold text-center h5">Chi Tiết Nhập Sách</div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sách</th>
                                        <th>Nhà xuất bản</th>
                                        <th>Số lượng</th>
                                        <th>Giá bìa</th>
                                        <th>Chiết khấu (%)</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($phieunhap->chiTietNhapSach as $index => $ct)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $ct->sach->TenSach ?? 'Đã xóa' }}</td>
                                            <td>{{ $ct->sach->nhaXuatBan->ten ?? 'Không xác định' }}</td>
                                            <td>{{ $ct->so_luong }}</td>
                                            <td>{{ number_format($ct->sach->GiaBia ?? 0, 0, ',', '.') }} đ</td>
                                            <td>{{ $ct->chiet_khau ?? $ct->sach->chiet_khau ?? 0 }}%</td>
                                            <td>{{ number_format($ct->thanh_tien, 0, ',', '.') }} đ</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Không có sách nào.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="text-right mt-4">
                            <a href="{{ route('admin.phieunhap.edit', $phieunhap->id) }}" class="btn btn-warning">✏️ Sửa phiếu nhập</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
