@extends('layouts.admin')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Danh sách đơn hàng</h4>
                        </div>

                         @if(session('success'))
                        <div class="alert alert-success mt-3">
                           {{ session('success') }}
                        </div>
                        @elseif(session('error'))
                           <div class="alert alert-danger mt-3">
                              {{ session('error') }}
                           </div>
                        @endif

                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Thêm Đơn Hàng</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="order-info">
                            <form action="{{ route('admin.orders.index') }}" method="GET" class="mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="ma_don" class="form-control"
                                               placeholder="Nhập mã đơn hàng (ID)"
                                               value="{{ request('ma_don') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="khach_hang" class="form-control"
                                               placeholder="Nhập tên khách hàng"
                                               value="{{ request('khach_hang') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary ml-2">Reset</a>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Ngày mua</th>
                                            <th>Hình thức thanh toán</th>
                                            <th>Giảm giá</th>
                                            <th>Tổng tiền</th>
                                            <th>Số lượng</th>
                                            <!-- chưa có là do chưa có model bảng khuyến mãi -->
                                            <th>Khuyến mãi</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->khachHang->name ?? 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->ngay_mua)->format('d/m/Y') }}</td>
                                            <td>{{ ucfirst(str_replace('_', ' ', $order->hinh_thuc_thanh_toan)) }}</td>
                                            <td>{{ $order->giam_gia }}%</td>
                                            <td>{{ number_format($order->tong_tien, 0, ',', '.') }} đ</td>
                                            <td>{{ $order->tong_so_luong }}</td>
                                            <td>{{ $order->khuyenMai->ten ?? 'Không có' }}</td>
                                            <td>
                                                @if ($order->trang_thai == 'cho_xu_ly')
                                                    <span class="badge badge-warning">Chờ xử lý</span>
                                                @elseif ($order->trang_thai == 'dang_giao')
                                                    <span class="badge badge-info">Đang giao</span>
                                                @elseif ($order->trang_thai == 'hoan_thanh')
                                                    <span class="badge badge-success">Hoàn thành</span>
                                                @elseif ($order->trang_thai == 'huy')
                                                    <span class="badge badge-danger">Hủy</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ $order->trang_thai }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center" style="gap: 6px;">
                                                    <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                       class="action-btn" data-toggle="tooltip" title="Sửa">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>

                                                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                                          method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn" data-toggle="tooltip" title="Xóa">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Phân trang -->
                                <div class="d-flex justify-content-center">
                                    {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
@endsection
