@extends('layouts.admin')

@section('content')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter">{{ number_format($totalUsers) }}</span></h2>
                                 <h5 class="">Người Dùng</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-book-line"></i></div>
                              <div class="text-left ml-3">                                 
                              <h2 class="mb-0"><span class="counter">{{ number_format($totalBooks) }}</span></h2>
                              <h5 class="">Sách</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-shopping-cart-2-line"></i></div>
                              <div class="text-left ml-3">                                 
                              <h2 class="mb-0"><span class="counter">{{ number_format($totalOrders) }}</span></h2>
                              <h5 class="">Đơn Hàng</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-info"><i class="ri-radar-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter">{{ number_format($pendingOrders) }}</span></h2>
                                 <h5 class="">Chờ xử lý</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Doanh số hàng ngày</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div id="iq-sale-chart"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Tóm lược</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <ul class="list-inline p-0 mb-0">
                              <li>
                                 <div class="iq-details mb-2">
                                    <span class="title">Thu nhập</span>
                                    <div class="percentage float-right text-primary">95 <span>%</span></div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                       <div class="iq-progress-bar iq-bg-primary">
                                          <span class="bg-primary" data-percent="90"></span>
                                       </div>
                                    </div>
                                 </div>                                       
                              </li>
                              <li>
                                 <div class="iq-details mb-2">
                                    <span class="title">Lợi nhuận</span>
                                    <div class="percentage float-right text-warning">72 <span>%</span></div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                       <div class="iq-progress-bar iq-bg-warning">
                                          <span class="bg-warning" data-percent="75"></span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                <div class="iq-details mb-2">
                                    <span class="title">Chi phí</span>
                                    <div class="percentage float-right text-info">75 <span>%</span></div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                       <div class="iq-progress-bar iq-bg-info">
                                          <span class="bg-info" data-percent="65"></span>
                                       </div>
                                    </div>
                                 </div> 
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <h4 class="text-uppercase text-black mb-0">Phiên (Bây giờ)</h4>
                              <div class="d-flex justify-content-between align-items-center">
                                 <div class="font-size-80 text-black">12</div>
                                 <div class="text-left">
                                    <p class="m-0 text-uppercase font-size-12">1 giờ</p>
                                    <div class="mb-1 text-black">1500<span class="text-danger"><i class="ri-arrow-down-s-fill"></i>3.25%</span></div>
                                    <p class="m-0 text-uppercase font-size-12">1 ngày</p>
                                    <div class="mb-1 text-black">1890<span class="text-success"><i class="ri-arrow-down-s-fill"></i>1.00%</span></div>
                                    <p class="m-0 text-uppercase font-size-12">1 tuần</p>
                                    <div class="text-black">1260<span class="text-danger"><i class="ri-arrow-down-s-fill"></i>9.87%</span></div>
                                 </div>
                              </div>
                              <div id="wave-chart-7"></div>
                           </div>
                        </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Mở hóa đơn</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <i class="ri-more-fill"></i>
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>Xem</a>
                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Xoá</a>
                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Sửa</a>
                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>In</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Tải xuống</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="order-info">
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
                                            <td>{{ $order->khuyenMai->ten_khuyen_mai ?? 'Không có' }}</td>
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
                           </div>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
@endsection
