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
                                        @if (count($cart) > 0)
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
                                                    @foreach ($cart as $item)
                                                        @php $total += $item['price'] * $item['quantity']; @endphp
                                                        <tr>
                                                            <td>
                                                                <img src="{{ asset('uploads/books/' . $item['image']) }}"
                                                                    width="60" class="img-fluid rounded">
                                                            </td>
                                                            <td>{{ $item['name'] }}</td>
                                                            <td>{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <button class="btn btn-sm btn-light px-2 btn-qty"
                                                                        data-id="{{ $item['id'] }}"
                                                                        data-action="decrease"
                                                                        {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>-
                                                                    </button>
                                                                    <input type="text"
                                                                        value="{{ $item['quantity'] }}"
                                                                        class="form-control text-center mx-1 qty-input"
                                                                        style="width: 50px;" readonly
                                                                        data-id="{{ $item['id'] }}">
                                                                    <button class="btn btn-sm btn-light px-2 btn-qty"
                                                                        data-id="{{ $item['id'] }}"
                                                                        data-action="increase">+
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                                                đ</td>
                                                            <td>
                                                                <button class="btn btn-danger btn-sm btn-remove"
                                                                    data-id="{{ $item['id'] }}" title="Xóa">
                                                                    <i class="ri-delete-bin-7-fill"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-between mt-3">
                                                <a href="{{ route('user.home.index') }}" class="btn btn-secondary">Tiếp
                                                    tục mua hàng</a>
                                                {{-- <a href="#" class="btn btn-success">Thanh toán</a> --}}
                                            </div>
                                        @else
                                            <p>Giỏ hàng trống.</p>
                                            <a href="{{ route('user.home.index') }}" class="btn btn-primary">Về trang
                                                chủ</a>
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
                                            <span id="cart-total">{{ isset($total) ? number_format($total, 0, ',', '.') : '0' }} đ</span>
                                        </div>
                                        {{-- Có thể bổ sung giảm giá, VAT, vận chuyển nếu muốn --}}
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark"><strong>Tổng thanh toán</strong></span>
                                            <span class="text-dark"><strong id="cart-total-final">{{ isset($total) ? number_format($total, 0, ',', '.') : '0' }} đ</strong></span>
                                        </div>
                                        <a id="place-order" href="{{ route('checkout.address') }}" class="btn btn-primary d-block mt-3 next">Đặt
                                            hàng</a>
                                    </div>
                                </div>
                                {{-- <div class="iq-card">
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
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.layout.footer')
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
    {{-- ajax cho giỏ hàng --}}
    <script>
        $(document).ready(function() {
            // Tăng/giảm số lượng
            $('.btn-qty').click(function() {
                var id = $(this).data('id');
                var action = $(this).data('action');
                var $row = $(this).closest('tr');
                $.ajax({
                    url: '{{ route('cart.update.ajax') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        action: action
                    },
                    success: function(res) {
                        if (res.success) {
                            $row.find('.qty-input').val(res.quantity);
                            $row.find('td').eq(4).html(res.item_total + ' đ');
                            $('#cart-total').html(res.cart_total + ' đ');
                            $('#cart-total-final').html(res.cart_total + ' đ');
                            $row.find('.btn-qty[data-action="decrease"]').prop('disabled', res.quantity <= 1);
                        }
                    }
                });
            });

            // Xóa sản phẩm
            $('.btn-remove').click(function() {
                var id = $(this).data('id');
                var $row = $(this).closest('tr');
                $.ajax({
                    url: '{{ route('cart.remove.ajax') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(res) {
                        if (res.success) {
                            $row.remove();
                            $('#cart-total').html(res.cart_total + ' đ');
                            $('#cart-total-final').html(res.cart_total + ' đ');
                        }
                    }
                });
            });
        });
    </script>


</body>

</html>
