<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Địa chỉ giao hàng</title>
    @include('user.layout.link_chung')
</head>

<body>
    <div id="loading">
        <div id="loading-center"></div>
    </div>

    <div class="wrapper">
        @include('user.layout.header', ['trang' => 'Địa chỉ giao hàng'])

        <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
                <div class="row">
                    <div id="address" class="card-block p-0 col-12">
                        <div class="row align-item-center">
                            <div class="col-lg-8">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Thêm địa chỉ mới</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <form action="{{ route('checkout.submit') }}" method="POST">
                                            @csrf
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Họ và tên: *</label>
                                                        <input type="text" class="form-control" name="fname" value="{{ old('fname') }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Số điện thoại: *</label>
                                                        <input type="text" class="form-control" name="mno" value="{{ old('mno') }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Địa chỉ: *</label>
                                                        <input type="text" class="form-control" name="houseno" value="{{ old('houseno') }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tỉnh/thành phố: *</label>
                                                        <input type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phường: *</label>
                                                        <input type="text" class="form-control" name="state" value="{{ old('state') }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addtype">Loại địa chỉ</label>
                                                        <select class="form-control" name="addtype" id="addtype">
                                                            <option value="Nhà riêng" {{ old('addtype') == 'Nhà riêng' ? 'selected' : '' }}>Nhà riêng</option>
                                                            <option value="Công ty" {{ old('addtype') == 'Công ty' ? 'selected' : '' }}>Công ty</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">Lưu và giao tại đây</button>
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
                                        <!-- Nút này sẽ có tác dụng sau khi lưu địa chỉ xong -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user.layout.footer')

    <!-- JS -->
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
