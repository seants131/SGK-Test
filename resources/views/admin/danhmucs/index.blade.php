@extends('layouts.admin')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Danh sách danh mục</h4>
                        </div>
                             @if(session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger mt-3">
                                    {{ session('error') }}
                                </div>
                            @endif
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="{{ route('admin.danhmucs.create') }}" class="btn btn-primary">Thêm danh mục mới</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="order-info">
                                <!-- Form tìm kiếm -->
                                <div class="w-100 p-3 bg-light rounded mb-3 border">
                                    <!-- Tìm kiếm cơ bản -->
                                    <form action="{{ route('admin.danhmucs.index') }}" method="GET">
                                        <!-- Dòng tìm kiếm cơ bản -->
                                        <div class="d-flex justify-content-center align-items-center mb-3">
                                            <!-- Input tên danh mục rộng và nằm giữa -->
                                            <div class="form-group mb-0 mr-2 flex-grow-1" style="max-width: 500px;">
                                                <input type="text" id="ten_danh_muc" name="ten_danh_muc" class="form-control w-100"
                                                    placeholder="Nhập tên danh mục" value="{{ request('ten_danh_muc') }}">
                                            </div>

                                            <!-- Nút tìm kiếm -->
                                            <div class="form-group mb-0 mr-2">
                                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                            </div>

                                            <!-- Nút tìm kiếm nâng cao -->
                                            <div class="form-group mb-0">
                                                <button type="button" class="btn btn-secondary" id="advanced-search-btn">Tìm kiếm nâng cao</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Tìm kiếm nâng cao -->
                                    <form action="{{ route('admin.danhmucs.index') }}" method="GET" id="advanced-search-form" style="display: none;" class="mt-3">
                                    <div id="advanced-search-form" style="display: none;" class="d-flex justify-content-center align-items-end flex-wrap mt-3">
                                            <div class="form-group mb-2 mr-2">
                                                <label for="ten_danh_muc_con">Tên danh mục con</label>
                                                <input type="text" id="ten_danh_muc_con" name="ten_danh_muc_con" class="form-control"
                                                    placeholder="Nhập tên danh mục con" value="{{ request('ten_danh_muc_con') }}">
                                            </div>
                                            <div class="form-group mb-2 mr-2">
                                                <label for="ngay_tao">Ngày tạo</label>
                                                <input type="date" id="ngay_tao" name="ngay_tao" class="form-control" value="{{ request('ngay_tao') }}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="d-block">&nbsp;</label>
                                                <button type="submit" class="btn btn-success">Tìm kiếm nâng cao</button>
                                                <a href="{{ route('admin.danhmucs.index') }}" class="btn btn-secondary ml-2">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              <table class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Tên Danh Mục</th>
                                    <th>Hành động</th>
                                    <th>Danh Mục Con</th>
                                    <th>Ngày tạo</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($danhmucs as $danhmuc)
                                        <tr>
                                            <td>{{ $danhmuc->name }}</td>
                                           
                                            <td>
                                                <div class="d-flex align-items-center" style="gap: 6px;">
                                                    <!-- Nút Sửa -->
                                                    <a href="{{ route('admin.danhmucs.edit', $danhmuc->id) }}"
                                                    class="action-btn" data-toggle="tooltip" title="Sửa">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>

                                                    <!-- Nút Xóa -->
                                                    <form action="{{ route('admin.danhmucs.destroy', $danhmuc->id) }}"
                                                        method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn" data-toggle="tooltip" title="Xóa">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>

                                            <td>
                                                @if($danhmuc->children->isNotEmpty())
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach($danhmuc->children as $child)
                                                            <li class="d-flex justify-content-between align-items-center mb-2">
                                                                <span>{{ $child->name }}</span>
                                                                <div class="d-flex align-items-center" style="gap: 6px;">
                                                                    <!-- Nút sửa -->
                                                                    <a href="{{ route('admin.danhmucs.edit', $child->id) }}"
                                                                    class="action-btn" data-toggle="tooltip" title="Sửa">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>

                                                                    <!-- Nút xóa -->
                                                                    <form action="{{ route('admin.danhmucs.destroy', $child->id) }}"
                                                                        method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="action-btn" data-toggle="tooltip" title="Xóa">
                                                                            <i class="ri-delete-bin-line"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    Không có
                                                @endif
                                            </td>
                                            <td>{{ $danhmuc->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <script>
                                    document.querySelectorAll('.delete-form').forEach(form => {
                                        form.addEventListener('submit', function (e) {
                                            const confirmDelete = confirm('Bạn có chắc chắn muốn xóa danh mục này không?');
                                            if (!confirmDelete) {
                                                e.preventDefault(); // Ngăn form submit nếu người dùng chọn "Hủy"
                                            }
                                        });
                                    });
                                </script>
                            </table>
                            <!-- Đặt phân trang bên ngoài vòng lặp -->
                                    <div class="d-flex justify-content-center">
                                    {{ $danhmucs->links('pagination::bootstrap-4') }} 
                                    </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <script>
    // Hiển thị/ẩn form tìm kiếm nâng cao khi nhấn nút
    document.getElementById('advanced-search-btn').addEventListener('click', function() {
        const form = document.getElementById('advanced-search-form');
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    });
    </script>
@endsection