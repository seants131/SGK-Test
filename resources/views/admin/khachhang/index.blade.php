@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between align-items-center">
                  <h4 class="card-title">Danh sách Người Dùng</h4>
                  <a href="{{ route('admin.khachhang.create') }}" class="btn btn-primary">Thêm người dùng</a>
               </div>

               @if(session('success'))
               <div class="alert alert-success mt-2">
                  {{ session('success') }}
               </div>
               @endif

               @if(session('error'))
               <div class="alert alert-danger mt-2">
                  {{ session('error') }}
               </div>
               @endif

               <div class="iq-card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>STT</th>
                              <th>Họ tên</th>
                              <th>Tên đăng nhập</th>
                              <th>Email</th>
                              <th>SĐT</th>
                              <th>Thao tác</th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse($khachhangs as $index => $khachhang)
                           <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $khachhang->name }}</td>
                              <td>{{ $khachhang->username }}</td>
                              <td>{{ $khachhang->email }}</td>
                              <td>{{ $khachhang->so_dien_thoai ?? '-' }}</td>
                              <td>
                                 <div class="d-flex align-items-center" style="gap: 6px;">
                                    <!-- Nút sửa -->
                                    <a href="{{ route('admin.khachhang.edit', $khachhang->id) }}"
                                       class="action-btn" data-toggle="tooltip" title="Sửa">
                                       <i class="ri-pencil-line"></i>
                                    </a>

                                    <!-- Nút xóa -->
                                    <form action="{{ route('admin.khachhang.destroy', $khachhang->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="action-btn" data-toggle="tooltip" title="Xóa">
                                          <i class="ri-delete-bin-line"></i>
                                       </button>
                                    </form>
                                 </div>
                              </td>
                           </tr>
                           @empty
                           <tr>
                              <td colspan="6" class="text-center">Chưa có Người dùng nào.</td>
                           </tr>
                           @endforelse
                        </tbody>
                     </table>
                  </div>

                  <!-- Paginate nếu có -->
                  <div class="mt-3 d-flex justify-content-center">
                     {{ $khachhangs->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
