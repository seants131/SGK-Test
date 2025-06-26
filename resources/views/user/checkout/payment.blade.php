{{-- filepath: resources/views/user/checkout/payment.blade.php --}}
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chọn phương thức thanh toán</title>
    @include('user.layout.link_chung')
    <style>
        body,
        label,
        .card-title,
        .iq-header-title,
        .shipping-address p,
        .mb-2,
        .btn,
        .form-control,
        .alert,
        .text-dark,
        .form-group label {
            color: #222 !important;
        }

        .form-control {
            color: #222 !important;
        }
    </style>
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <!-- loader END -->
    <div class="wrapper">
        @include('user.layout.header', ['trang' => 'Thanh toán'])
        <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Chọn phương thức thanh toán</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div>
                                            <input type="radio" id="credit" name="payment_method" value="credit" required>
                                            <label for="credit">Thẻ Tín dụng / Ghi nợ / ATM</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="momo" name="payment_method" value="momo_zalopay">
                                            <label for="momo">Momo/ZaloPay</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="installment" name="payment_method" value="installment">
                                            <label for="installment">Trả góp</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="cod" name="payment_method" value="cod">
                                            <label for="cod">Thanh toán khi giao hàng (COD)</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Tiếp tục</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <h4 class="mb-2">Chi tiết đơn hàng</h4>
                                <div class="d-flex justify-content-between">
                                    <span>Giá sản phẩm</span>
                                    <span><strong>{{ isset($cart_total) ? number_format($cart_total, 0, ',', '.') : '0' }}đ</strong>
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Phí vận chuyển</span>
                                    <span class="text-success">Miễn phí</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span>Số tiền phải trả</span>
                                    <span><strong>{{ isset($cart_total) ? number_format($cart_total, 0, ',', '.') : '0' }}đ</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Chính sách bảo mật</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Điều khoản sử dụng</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2020 <a href="#">TVteam</a> Đã đăng kí
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/countdown.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('js/lottie.js') }}"></script>
    <script src="{{ asset('js/core.js') }}"></script>
    <script src="{{ asset('js/charts.js') }}"></script>
    <script src="{{ asset('js/animated.js') }}"></script>
    <script src="{{ asset('js/kelly.js') }}"></script>
    <script src="{{ asset('js/maps.js') }}"></script>
    <script src="{{ asset('js/worldLow.js') }}"></script>
    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.js') }}"></script>
    <script src="{{ asset('js/morris.min.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
    <script src="{{ asset('js/style-customizer.js') }}"></script>
    <script src="{{ asset('js/chart-custom.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>