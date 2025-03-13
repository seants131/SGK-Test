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
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
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
                                                <a href="{{ route('admin.danhmucs.edit', $danhmuc->id) }}" class="btn btn-warning">Sửa</a>
                                                <form action="{{ route('admin.danhmucs.destroy', $danhmuc->id) }}" method="POST" style="display:inline;" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </td>
                                            <td>
                                                @if($danhmuc->children->isNotEmpty())
                                                    <ul>
                                                        @foreach($danhmuc->children as $child)
                                                            <li>
                                                                {{ $child->name }}
                                                                <a href="{{ route('admin.danhmucs.edit', $child->id) }}" class="btn btn-warning">Sửa</a>
                                                                <form action="{{ route('admin.danhmucs.destroy', $child->id) }}" method="POST" style="display:inline;" class="delete-form">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                                </form>
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
@endsection