<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Địa chỉ</title>
    @include('user.layout.link_chung')
    <style>
        body, label, .card-title, .iq-header-title, .shipping-address p, .mb-2, .btn, .form-control, .alert, .text-dark, .form-group label {
            color: #222 !important; /* hoặc #111 hoặc #000 nếu muốn đậm hơn */
        }
        .form-control {
            color: #222 !important;
        }

    </style>
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
        @include('user.layout.header', ['trang' => 'địa chỉ giao hàng'])
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
                <div class="row">
<div class="col-lg-8">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Thêm địa chỉ mới</h4>
            </div>
        </div>
        <div class="iq-card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('checkout.submit') }}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Họ và tên: *</label>
                            <input type="text" class="form-control" name="fname" value="{{ old('fname', $address['fname'] ?? '') }}" required>
                            @error('fname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email: *</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $address['email'] ?? '') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số điện thoại: *</label>
                            <input type="text" class="form-control" name="mno" value="{{ old('mno', $address['mno'] ?? '') }}" required>
                            @error('mno')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Địa chỉ: *</label>
                            <input type="text" class="form-control" name="houseno" value="{{ old('houseno', $address['houseno'] ?? '') }}" required>
                            @error('houseno')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tỉnh/thành phố: *</label>
                            <input type="text" class="form-control" name="city" value="{{ old('city', $address['city'] ?? '') }}" required>
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phường: *</label>
                            <input type="text" class="form-control" name="state" value="{{ old('state', $address['state'] ?? '') }}" required>
                            @error('state')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="addtype">Loại địa chỉ</label>
                            <select class="form-control" name="addtype" id="addtype">
                                <option value="Nhà riêng" {{ old('addtype', $address['addtype'] ?? '') == 'Nhà riêng' ? 'selected' : '' }}>Nhà riêng</option>
                                <option value="Công ty" {{ old('addtype', $address['addtype'] ?? '') == 'Công ty' ? 'selected' : '' }}>Công ty</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary mt-4">Lưu và giao tại đây</button>
                    </div>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="col-lg-4">
    @if (Auth::check() && isset($address))
        <div class="iq-card">
            <div class="iq-card-body">
                <h4 class="mb-2">{{ $address['fname'] }}</h4>
                <div class="shipping-address">
                    <p class="mb-0">{{ $address['houseno'] }}</p>
                    <p>{{ $address['city'] }}</p>
                    <p>{{ $address['mno'] }}</p>
                </div>
                <hr>
                <a href="{{ route('checkout.payment') }}" class="btn btn-primary d-block mt-1">Tiếp tục</a>
            </div>
        </div>
    @elseif(Auth::check())
        <div class="iq-card">
            <div class="iq-card-body">
                <h4 class="mb-2">Thông tin mẫu</h4>
                <div class="shipping-address">
                    <p class="mb-0">11 Thành Thái</p>
                    <p>Thành phố Đà Nẵng</p>
                    <p>0789-999-999</p>
                </div>
                <hr>
                <a href="javascript:void(0);" class="btn btn-primary d-block mt-1 next disabled">Tiếp tục</a>
            </div>
        </div>
    @endif
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

