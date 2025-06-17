@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="iq-card">
          <div class="iq-card-header d-flex justify-content-between">
            <h4 class="card-title">Chỉnh sửa liên hệ</h4>
          </div>

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
          @endif

          <form method="POST" action="{{ route('admin.lienhe.update', $contact->id) }}">
            @csrf @method('PUT')
            <a href="{{ route('admin.lienhe.index') }}" class="close-form-button" title="Đóng">&times;</a>

            <div class="form-group">
              <label for="hoten">Họ tên:</label>
              <input type="text" name="hoten" id="hoten"
                     class="form-control" value="{{ old('hoten', $contact->hoten) }}" required>
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email"
                     class="form-control" value="{{ old('email', $contact->email) }}" required>
            </div>

            <div class="form-group">
              <label for="chude">Chủ đề:</label>
              <input type="text" name="chude" id="chude"
                     class="form-control" value="{{ old('chude', $contact->chude) }}" required>
            </div>

            <div class="form-group">
              <label for="noidung">Nội dung:</label>
              <textarea name="noidung" id="noidung"
                        class="form-control" required>{{ old('noidung', $contact->noidung) }}</textarea>
            </div>

            <div class="form-group d-flex justify-content-between mt-3">
                <div>
                    <button type="submit" class="btn btn-warning">Cập nhật sách</button>
                </div>
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">← Trở về</a>
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
       /* Container cho form */
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
            height: 100%; /*Chiều cao bằng 100% màn hình */
            padding: 10px; /* Giảm padding xung quanh container */
            background-color: #f8f9fa; /* Màu nền sáng nhẹ hơn */
        }

        form {
            background-color: #ffffff; /* Màu nền của form */
            padding: 15px; /* Giảm padding bên trong form */
            border-radius: 8px; /* Đường bo góc mềm mại */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng nhẹ */
            width: 100%;
            max-width: 1250px;/* Giới hạn chiều rộng form nhỏ hơn */
            box-sizing: border-box;
        }

        /* Nhóm các phần tử form */
        .form-group {
            margin-bottom: 15px;
        }

        /* Định dạng cho label */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Định dạng cho các input, select, và textarea */
        input, select, textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Định dạng cho textarea */
        textarea {
            height: 120px;
            resize: vertical;
        }

        /* Định dạng cho nút bấm */
        button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Căn giữa tiêu đề */
        h1.text-center {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
    </style>
@endsection