@extends('layouts.admin')

@section('content')

 <!-- Page Content  -->
 <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Thêm sách</h4>
                           </div>
                        </div>
                        <!-- <div class="iq-card-body"> -->
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
                        <form method="POST" action="{{ route('admin.books.update', $book->MaSach) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            
                            <label for="HinhAnh">Hình ảnh:</label>
                            <input type="file" name="HinhAnh" id="HinhAnh" accept="image/*">
                            
                            <label for="TenSach">Tên sách:</label>
                            <input type="text" name="TenSach" id="TenSach" value="{{ old('TenSach', $book->TenSach) }}" required>

                            <label for="category_id">Danh Mục:</label>
                            <select name="category_id" id="category_id" required>
                                <option value="">Chọn danh mục</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="GiaNhap">Giá nhập:</label>
                            <input type="number" name="GiaNhap" id="GiaNhap" value="{{ old('GiaNhap', $book->GiaNhap) }}" required>

                            <label for="GiaBan">Giá bán:</label>
                            <input type="number" name="GiaBan" id="GiaBan" value="{{ old('GiaBan', $book->GiaBan) }}" required>

                            <label for="SoLuong">Số lượng:</label>
                            <input type="number" name="SoLuong" id="SoLuong" value="{{ old('SoLuong', $book->SoLuong) }}" required>

                            <label for="NamXuatBan">Năm xuất bản:</label>
                            <input type="number" name="NamXuatBan" id="NamXuatBan" value="{{ old('NamXuatBan', $book->NamXuatBan) }}" required>

                            <label for="MoTa">Mô tả:</label>
                            <textarea name="MoTa" id="MoTa">{{ old('MoTa', $book->MoTa) }}</textarea>

                            <label for="TrangThai">Trạng Thái:</label>
                            <select name="TrangThai" id="TrangThai" required>
                                <option value="1" {{ $book->TrangThai == 1 ? 'selected' : '' }}>Còn hàng</option>
                                <option value="0" {{ $book->TrangThai == 0 ? 'selected' : '' }}>Hết hàng</option>
                            </select>

                            <label for="MaNXB">Mã NXB:</label>
                            <input type="text" name="MaNXB" id="MaNXB" value="{{ old('MaNXB', $book->MaNXB) }}">

                            <button type="submit" class="btn btn-warning">Cập nhật sách</button>
                        </form>
                        <!-- </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
@endsection
@section('styles')
    <style>
       /* Container cho form */
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