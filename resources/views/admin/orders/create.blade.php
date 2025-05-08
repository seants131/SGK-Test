@extends('layouts.admin')

@section('content')

<!-- Page Content -->
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
                    
                    <form method="POST" action="{{ route('admin.orders.store') }}" enctype="multipart/form-data">
                        @csrf
                        <a href="{{ route('admin.orders.index') }}" class="close-form-button" title="Đóng">&times;</a>

                        <div class="form-group">
                            <label for="khach_hang_id">Khách hàng:</label>
                            <select name="khach_hang_id" id="khach_hang_id" required>
                                <option value="">-- Chọn khách hàng --</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('khach_hang_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->ho_ten }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ngay_dat">Ngày đặt:</label>
                            <input type="date" name="ngay_dat" id="ngay_dat" required value="{{ old('ngay_dat') }}">
                        </div>

                        <div class="form-group">
                            <label for="trang_thai">Trạng thái:</label>
                            <select name="trang_thai" id="trang_thai" required>
                                <option value="Cho xu ly" {{ old('trang_thai') == 'Cho xu ly' ? 'selected' : '' }}>Chờ xử lý</option>
                                <option value="Dang giao" {{ old('trang_thai') == 'Dang giao' ? 'selected' : '' }}>Đang giao</option>
                                <option value="Hoan thanh" {{ old('trang_thai') == 'Hoan thanh' ? 'selected' : '' }}>Hoàn thành</option>
                                <option value="Huy" {{ old('trang_thai') == 'Huy' ? 'selected' : '' }}>Hủy</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tong_tien">Tổng tiền:</label>
                            <input type="number" name="tong_tien" id="tong_tien" required value="{{ old('tong_tien') }}">
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
<!-- Wrapper END -->
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
