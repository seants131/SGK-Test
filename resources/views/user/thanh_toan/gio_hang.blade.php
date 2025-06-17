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
        @include('user.layout.header', ['trang' => 'Giỏ hàng'])
        <!-- Page Content  -->
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
                                        <ul class="list-inline p-0 m-0">
                                            <li class="checkout-product">
                                                {{-- danh sách sản phẩm trong giỏ hàng--}} 
                                                <div class="row align-items-center">  
                                                    <div class="col-sm-2">
                                                        <span class="checkout-product-img">
                                                            <a href="javascript:void();"><img class="img-fluid rounded"
                                                                    src="images/book-dec/tienganh.png"
                                                                    alt=""></a>
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="checkout-product-details">
                                                            <h5>Tiếng Anh 7 - Global Success - Sách Bài học (2023)</h5>
                                                            <p class="text-success">Còn hàng</p>
                                                            <div class="price">
                                                                <h5>99.900 ₫</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <div class="row align-items-center mt-2">
                                                                    <div class="col-sm-7 col-md-6">
                                                                        <button type="button"
                                                                            class="fa fa-minus qty-btn"
                                                                            id="btn-minus"></button>
                                                                        <input type="text" id="quantity"
                                                                            value="0">
                                                                        <button type="button"
                                                                            class="fa fa-plus qty-btn"
                                                                            id="btn-plus"></button>
                                                                    </div>
                                                                    <div class="col-sm-5 col-md-6">
                                                                        <span class="product-price">99.900 ₫</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a href="javascript:void();"
                                                                    class="text-dark font-size-20"><i
                                                                        class="ri-delete-bin-7-fill"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
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
                                            <span>99.000đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Giảm giá</span>
                                            <span class="text-success">19.000đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Thuế VAT</span>
                                            <span>9.900đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Phí vận chuyển</span>
                                            <span class="text-success">Miễn phí</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark"><strong>Tổng</strong></span>
                                            <span class="text-dark"><strong>108.900 đ</strong></span>
                                        </div>
                                        <a id="place-order" href="javascript:void();"
                                            class="btn btn-primary d-block mt-3 next">Đặt hàng</a>
                                    </div>
                                </div>
                                <div class="iq-card ">
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
