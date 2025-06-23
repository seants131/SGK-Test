<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Giỏ hàng</title>
    @include('user.layout.link_chung')
</head>
<body>
    <div class="wrapper">
        @include('user.layout.header', ['trang' => 'Giỏ hàng'])
        <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
                <div class="row">
                    <div id="cart" class="card-block show p-0 col-12">
                        <div class="row align-item-center">
                            <div class="col-lg-8">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Giỏ hàng</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        @if(count($cart) > 0)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Ảnh</th>
                                                    <th>Tên sách</th>
                                                    <th>Giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $total = 0; @endphp
                                                @foreach($cart as $item)
                                                @php $total += $item['price'] * $item['quantity']; @endphp
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('uploads/books/' . $item['image']) }}" width="60" class="img-fluid rounded">
                                                    </td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                                                    <td>{{ $item['quantity'] }}</td>
                                                    <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} đ</td>
                                                    <td>
                                                        <form action="{{ route('cart.remove') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Xóa">
                                                                <i class="ri-delete-bin-7-fill"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-right font-weight-bold">Tổng tiền:</td>
                                                    <td colspan="2" class="font-weight-bold text-danger">{{ number_format($total, 0, ',', '.') }} đ</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ route('user.home.index') }}" class="btn btn-secondary">Tiếp tục mua hàng</a>
                                            <a href="#" class="btn btn-success">Thanh toán</a>
                                        </div>
                                        @else
                                        <p>Giỏ hàng trống.</p>
                                        <a href="{{ route('user.home.index') }}" class="btn btn-primary">Về trang chủ</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <p>Tùy chọn</p>
                                        <div class="d-flex justify-content-between">
                                            <span>Phiếu giảm giá</span>
                                            <span><a href="#"><strong>Áp dụng</strong></a></span>
                                        </div>
                                        <hr>
                                        <p><b>Chi tiết</b></p>
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Tổng</span>
                                            <span>{{ isset($total) ? number_format($total, 0, ',', '.') : '0' }} đ</span>
                                        </div>
                                        {{-- Có thể bổ sung giảm giá, VAT, vận chuyển nếu muốn --}}
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark"><strong>Tổng thanh toán</strong></span>
                                            <span class="text-dark"><strong>{{ isset($total) ? number_format($total, 0, ',', '.') : '0' }} đ</strong></span>
                                        </div>
                                        <a id="place-order" href="#" class="btn btn-primary d-block mt-3 next">Đặt hàng</a>
                                    </div>
                                </div>
                                <div class="iq-card">
                                    <div class="card-body iq-card-body p-0 iq-checkout-policy">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex align-items-center">
                                                <div class="iq-checkout-icon">
                                                    <i class="ri-checkbox-line"></i>
                                                </div>
                                                <h6>Chính sách bảo mật (Thanh toán an toàn và bảo mật.)</h6>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <div class="iq-checkout-icon">
                                                    <i class="ri-truck-line"></i>
                                                </div>
                                                <h6>Chính sách giao hàng (Giao hàng tận nhà.)</h6>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <div class="iq-checkout-icon">
                                                    <i class="ri-arrow-go-back-line"></i>
                                                </div>
                                                <h6>Chính sách hoàn trả</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#">Chính sách bảo mật</a></li>
                        <li class="list-inline-item"><a href="#">Điều khoản sử dụng</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2020 <a href="#">TVteam</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>