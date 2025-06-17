<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Giỏ hàng</title>
    @include('user.layout.link_chung')
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        @include('user.layout.header', ['trang' => 'Thanh toán'])
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
                <div class="row">
                    <div id="payment" class="card-block p-0 col-12">
                        <div class="row align-item-center">
                            <div class="col-lg-8">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Lựa chọn thanh toán</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        {{-- <form class="mt-3">
                                    <div class="d-flex align-items-center">
                                       <span>Mã giảm giá: </span>
                                       <div class="cvv-input ml-3 mr-3">
                                          <input type="text" class="form-control" required=""> 
                                       </div>
                                       <button type="submit" class="btn btn-primary">Tiếp tục</button>
                                    </div>
                                 </form>
                                 <hr> --}}
                                        <div class="card-lists">
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="credit" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="credit"> Thẻ Tín dụng /
                                                        Ghi nợ / ATM</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="netbaking" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="netbaking">
                                                        Momo/ZaloPay</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="emi" name="emi"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="emi"> Trả góp</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="cod" name="cod"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="cod"> Thanh toán khi
                                                        giao hàng </label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <a id="deliver-address" href="javascript:void();"
                                            class="btn btn-primary d-block mt-1 next">Thanh toán</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <h4 class="mb-2">Chi tiết</h4>
                                        <div class="d-flex justify-content-between">
                                            <span>Giá 3 sản phẩm</span>
                                            <span><strong>329.900đ</strong></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Phí vận chuyển</span>
                                            <span class="text-success">Miễn phí</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <span>Số tiền phải trả</span>
                                            <span><strong>329.900đ</strong></span>
                                        </div>
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
