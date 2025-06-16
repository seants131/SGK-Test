@extends('layouts.admin')

@section('content')

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Thêm đơn hàng</h4>
                        </div>
                    </div>

                    <!-- Hiển thị lỗi nếu có -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.orders.store') }}">
                        @csrf
                        <a href="{{ route('admin.orders.index') }}" class="close-form-button" title="Đóng">&times;</a>

                        <div class="form-group">
                            <label for="user_id">Khách hàng:</label>
                            <select name="user_id" id="user_id" required>
                                <option value="">-- Chọn khách hàng --</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('user_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ngay_mua">Ngày mua:</label>
                            <input type="date" name="ngay_mua" id="ngay_mua" required value="{{ old('ngay_mua') }}">
                        </div>

                        <div class="form-group">
                            <label for="trang_thai">Trạng thái:</label>
                            <select name="trang_thai" id="trang_thai" required>
                                <option value="cho_xu_ly" {{ old('trang_thai') == 'cho_xu_ly' ? 'selected' : '' }}>Chờ xử lý</option>
                                <option value="dang_giao" {{ old('trang_thai') == 'dang_giao' ? 'selected' : '' }}>Đang giao</option>
                                <option value="hoan_thanh" {{ old('trang_thai') == 'hoan_thanh' ? 'selected' : '' }}>Hoàn thành</option>
                                <option value="huy" {{ old('trang_thai') == 'huy' ? 'selected' : '' }}>Hủy</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hinh_thuc_thanh_toan">Hình thức thanh toán:</label>
                            <select name="hinh_thuc_thanh_toan" id="hinh_thuc_thanh_toan" required>
                                <option value="tien_mat" {{ old('hinh_thuc_thanh_toan') == 'tien_mat' ? 'selected' : '' }}>Tiền mặt</option>
                                <option value="chuyen_khoan" {{ old('hinh_thuc_thanh_toan') == 'chuyen_khoan' ? 'selected' : '' }}>Chuyển khoản</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="giam_gia">Giảm giá (%):</label>
                            <input type="number" name="giam_gia" id="giam_gia" min="0" max="100" value="{{ old('giam_gia', 0) }}">
                        </div>

                        <div class="form-group">
                            <label for="tong_tien">Tổng tiền (VND):</label>
                            <input type="number" name="tong_tien" id="tong_tien" required min="0" value="{{ old('tong_tien') }}">
                        </div>

                        <div class="form-group">
                            <label for="tong_so_luong">Tổng số lượng:</label>
                            <input type="number" name="tong_so_luong" id="tong_so_luong" required min="0" value="{{ old('tong_so_luong') }}">
                        </div>

                        <div class="form-group">
                            <label for="khuyen_mai_id">Khuyến mãi (nếu có):</label>
                            <input type="number" name="khuyen_mai_id" id="khuyen_mai_id" min="1" value="{{ old('khuyen_mai_id') }}">
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <div>
                            <button type="submit" class="btn btn-success">Thêm Đơn Hàng</button>
                            </div>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">← Trở về</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .close-form-button {
        position: absolute;
        top: 15px;
        right: 20px;
        z-index: 10;
        background-color: #dc3545;
        color: white;
        font-size: 22px;
        font-weight: bold;
        line-height: 1;
        border: none;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .close-form-button:hover {
        background-color: #bd2130;
        text-decoration: none;
    }
    
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        background-color: #f8f9fa;
    }

    form {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 1250px;
        box-sizing: border-box;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        height: 120px;
        resize: vertical;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }

    button:hover {
        background-color: rgb(21, 206, 86);
    }

    h1.text-center {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }
</style>
@endsection
