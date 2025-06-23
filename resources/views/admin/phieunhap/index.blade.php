@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Danh sách phiếu nhập</h4>
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
                     <a href="{{ route('admin.phieunhap.create') }}" class="btn btn-primary">Tạo phiếu nhập</a>
                  </div>
               </div>

               <div class="iq-card-body">
                  <div class="order-info">
                     <div class="w-100 p-3 bg-light rounded mb-3 border">
                        <form action="{{ route('admin.phieunhap.index') }}" method="GET">
                           <div class="d-flex justify-content-center align-items-center mb-3">
                              <div class="form-group mb-0 mr-2 flex-grow-1" style="max-width: 300px;">
                                 <input type="text" name="ho_ten" class="form-control w-100" placeholder="Nhập tên người nhập"
                                        value="{{ request('ho_ten') }}">
                              </div>
                              <div class="form-group mb-0 mr-2">
                                 <input type="date" name="ngay_nhap" class="form-control"
                                        value="{{ request('ngay_nhap') }}">
                              </div>
                              <div class="form-group mb-0">
                                 <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                 <a href="{{ route('admin.phieunhap.index') }}" class="btn btn-secondary ml-2">Reset</a>
                              </div>
                           </div>
                        </form>
                     </div>

                     @if ($phieunhaps->isEmpty())
                        <p>Không có phiếu nhập nào.</p>
                     @else
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Ngày nhập</th>
                                 <th>Người nhập</th>
                                 <th>Tổng SL</th>
                                 <th>Tổng tiền</th>
                                 <th>Hành động</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($phieunhaps as $index => $phieu)
                                 <tr>
                                    <td>{{ $phieunhaps->firstItem() + $index }}</td>
                                    <td>{{ \Carbon\Carbon::parse($phieu->ngay_nhap)->format('d/m/Y') }}</td>
                                    <td>{{ $phieu->khachHang->name ?? 'N/A' }}</td>
                                    <td>{{ number_format($phieu->tong_so_luong) }}</td>
                                    <td>{{ number_format($phieu->tong_tien, 0, ',', '.') }} đ</td>
                                    <td>
                                       <div class="d-flex align-items-center" style="gap: 6px;">
                                          <a href="{{ route('admin.phieunhap.show', $phieu->id) }}" class="action-btn" data-toggle="tooltip" title="Xem">
                                             <i class="ri-eye-line"></i>
                                          </a>
                                          <button type="button"
                                                  class="action-btn btn-delete"
                                                  data-id="{{ $phieu->id }}"
                                                  data-toggle="tooltip"
                                                  title="Xóa">
                                             <i class="ri-delete-bin-line"></i>
                                          </button>
                                       </div>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>

                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                           <div class="modal-dialog" role="document">
                              <form method="POST" id="deleteForm">
                                 @csrf
                                 @method('DELETE')
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title">Xác nhận xóa</h5>
                                       <button type="button" class="close" data-dismiss="modal">
                                          <span>&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       Bạn có chắc chắn muốn xóa phiếu nhập này không?
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                       <button type="submit" class="btn btn-danger">Xóa</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     @endif

                     <div class="d-flex justify-content-center mt-3">
                        {{ $phieunhaps->links('pagination::bootstrap-4') }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script>
   document.addEventListener('DOMContentLoaded', function () {
      const deleteButtons = document.querySelectorAll('.btn-delete');
      const deleteForm = document.getElementById('deleteForm');

      deleteButtons.forEach(button => {
         button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const url = "{{ route('admin.phieunhap.destroy', ':id') }}".replace(':id', id);
            deleteForm.setAttribute('action', url);
            $('#deleteModal').modal('show');
         });
      });
   });
</script>
@endsection
