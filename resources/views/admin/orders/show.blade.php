@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Chi tiết đơn hàng</h4>
                        </div>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-secondary">← Quay lại danh sách</a>
                    </div>
                    <div class="iq-card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">Mã đơn hàng</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Khách hàng</th>
                                <td>{{ $order->khachHang->name ?? 'Không xác định' }}</td>
                            </tr>
                            <tr>
                                <th>Ngày mua</th>
                                <td>{{ \Carbon\Carbon::parse($order->ngay_mua)->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Hình thức thanh toán</th>
                                <td>{{ ucfirst(str_replace('_', ' ', $order->hinh_thuc_thanh_toan)) }}</td>
                            </tr>
                            <tr>
                                <th>Giảm giá</th>
                                <td>{{ $order->giam_gia }}%</td>
                            </tr>
                            <tr>
                                <th>Tổng số lượng</th>
                                <td>{{ $order->tong_so_luong }}</td>
                            </tr>
                            <tr>
                                <th>Tổng tiền</th>
                                <td>{{ number_format($order->tong_tien, 0, ',', '.') }} đ</td>
                            </tr>
                            <tr>
                                <th>Khuyến mãi</th>
                                <td>{{ $order->khuyenMai->ten ?? 'Không áp dụng' }}</td>
                            </tr>
                            <tr>
                                <th>Trạng thái</th>
                                <td>
                                    @switch($order->trang_thai)
                                        @case('cho_xu_ly')
                                            <span class="badge badge-warning">Chờ xử lý</span>
                                            @break
                                        @case('da_xu_ly')
                                            <span class="badge badge-success">Đã xử lý</span>
                                            @break
                                        @case('dang_giao')
                                            <span class="badge badge-info">Đang giao</span>
                                            @break
                                        @case('hoan_thanh')
                                            <span class="badge badge-primary">Hoàn thành</span>
                                            @break
                                        @case('huy')
                                            <span class="badge badge-danger">Đã hủy</span>
                                            @break
                                        @default
                                            <span class="badge badge-secondary">{{ ucfirst(str_replace('_', ' ', $order->trang_thai)) }}</span>
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <th>Cập nhật lần cuối</th>
                                <td>{{ $order->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
