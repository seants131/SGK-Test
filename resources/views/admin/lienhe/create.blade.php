@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="iq-card">
          <div class="iq-card-header d-flex justify-content-between">
            <h4 class="card-title">Thêm liên hệ</h4>
          </div>

          {{-- Hiển thị lỗi --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('admin.lienhe.store') }}">
            @csrf
            <a href="{{ route('admin.lienhe.index') }}" class="close-form-button" title="Đóng">&times;</a>

            <div class="form-group">
              <label for="hoten">Họ tên:</label>
              <input type="text" name="hoten" id="hoten"
                     class="form-control" value="{{ old('hoten') }}" required>
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email"
                     class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
              <label for="chude">Chủ đề:</label>
              <input type="text" name="chude" id="chude"
                     class="form-control" value="{{ old('chude') }}" required>
            </div>

            <div class="form-group">
              <label for="noidung">Nội dung:</label>
              <textarea name="noidung" id="noidung"
                        class="form-control" required>{{ old('noidung') }}</textarea>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div>
                    <button type="submit" class="btn btn-success">Thêm Sách</button>
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
