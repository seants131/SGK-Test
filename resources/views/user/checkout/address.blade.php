
<div id="content-page" class="content-page">
    <div class="container-fluid checkout-content">
        <div class="row">
            <div id="address" class="card-block p-0 col-12">
                <div class="row align-item-center">
                    <div class="col-lg-8">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Thông tin giao hàng</h4>
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
                                                <input type="text" class="form-control" name="fname"
                                                    value="{{ old('fname', $address['fname'] ?? '') }}" required>
                                                @error('fname')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email: *</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ old('email', $address['email'] ?? '') }}" required>
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số điện thoại: *</label>
                                                <input type="text" class="form-control" name="mno"
                                                    value="{{ old('mno', $address['mno'] ?? '') }}" required>
                                                @error('mno')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Địa chỉ: *</label>
                                                <input type="text" class="form-control" name="houseno"
                                                    value="{{ old('houseno', $address['houseno'] ?? '') }}" required>
                                                @error('houseno')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tỉnh/thành phố: *</label>
                                                <input type="text" class="form-control" name="city"
                                                    value="{{ old('city', $address['city'] ?? '') }}" required>
                                                @error('city')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phường: *</label>
                                                <input type="text" class="form-control" name="state"
                                                    value="{{ old('state', $address['state'] ?? '') }}" required>
                                                @error('state')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-end">
                                            <button type="submit" class="btn btn-primary mt-4">Lưu và giao tại đây</button>
                                        </div>
                                    </div>
                                </form>
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
                                    <a href="{{ route('checkout.payment') }}"
                                        class="btn btn-primary d-block mt-1">Tiếp tục</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
