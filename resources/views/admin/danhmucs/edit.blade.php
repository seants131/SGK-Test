@extends('layouts.admin')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Sửa danh mục</h4>
                        </div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                         
                        <div class="iq-card-body">
                        <form action="{{ route('admin.danhmucs.update', $danhmuc->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <a href="{{ route('admin.danhmucs.index') }}" class="close-form-button" title="Đóng">&times;</a>
                            <!-- Tên danh mục -->
                            <label for="name">Tên danh mục:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $danhmuc->name) }}" required>

                            <!-- Danh mục cha -->
                            <label for="parent_id">Danh mục cha:</label>
                            <select name="parent_id" id="parent_id">
                                <option value="">Chọn danh mục cha</option>
                                @foreach($danhmucs as $cat)
                                    <option value="{{ $cat->id }}" 
                                        {{ old('parent_id', $danhmuc->parent_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- <button type="submit" class="btn btn-warning">Cập nhật danh mục</button> -->
                            <div class="form-group d-flex justify-content-between mt-3">
                                <div>
                                    <button type="submit" class="btn btn-warning">Cập nhật danh mục</button>
                                </div>
                                    <a href="{{ route('admin.danhmucs.index') }}" class="btn btn-secondary">← Trở về</a>
                            </div>
                        </form>
                        </div>
                     </div>
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
    </style>
@endsection
