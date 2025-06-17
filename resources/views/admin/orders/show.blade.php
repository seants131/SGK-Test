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
                                <td>{{ $order->ma_donhang ?? $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Khách hàng</th>
                                <td>{{ $order->khachhang->ho_ten ?? 'Không xác định' }}</td>
                            </tr>
                            <tr>
                                <th>Tổng tiền</th>
                                <td>{{ number_format($order->tong_tien, 0, ',', '.') }} đ</td>
                            </tr>
                            <tr>
                                <th>Trạng thái</th>
                                <td>
                                    @if ($order->trangthai == 'chờ xử lý')
                                        <span class="badge badge-warning">Chờ xử lý</span>
                                    @elseif ($order->trang_thai == 'đã xử lý')
                                        <span class="badge badge-success">Đã xử lý</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $order->trang_thai }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Ngày tạo</th>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
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
