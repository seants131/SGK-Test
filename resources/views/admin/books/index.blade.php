@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Danh sách sách</h4>
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
                     <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Thêm sách</a>
                  </div>
               </div>

               <div class="iq-card-body">
                  <div class="order-info">
                     <!-- FORM TÌM KIẾM -->
                     <div class="w-100 p-3 bg-light rounded mb-3 border">
                        <!-- Tìm kiếm cơ bản -->
                        <form action="{{ route('admin.books.index') }}" method="GET">
                           <div class="d-flex justify-content-center align-items-center mb-3">
                              <div class="form-group mb-0 mr-2 flex-grow-1" style="max-width: 500px;">
                                 <input type="text" id="ten_sach" name="ten_sach" class="form-control w-100"
                                    placeholder="Nhập tên sách" value="{{ request('ten_sach') }}">
                              </div>
                              <div class="form-group mb-0 mr-2">
                                 <button type="submit" class="btn btn-success">Tìm kiếm</button>
                              </div>
                              <div class="form-group mb-0">
                                 <button type="button" class="btn btn-secondary" id="advanced-search-btn">Tìm kiếm nâng cao</button>
                              </div>
                           </div>
                        </form>

                        <!-- Tìm kiếm nâng cao -->
                        <form action="{{ route('admin.books.index') }}" method="GET" id="advanced-search-form" style="display: none;" class="mt-3">
                           <div class="d-flex justify-content-center align-items-end flex-wrap mt-3">
                              <div class="form-group mb-2 mr-2">
                                 <label for="tac_gia">Tên tác giả</label>
                                 <input type="text" id="tac_gia" name="tac_gia" class="form-control w-100"
                                    placeholder="Nhập tên tác giả" value="{{ request('tac_gia') }}">
                              </div>

                              <div class="form-group mb-2 mr-2">
                                 <label for="ngay_tao">Ngày tạo</label>
                                 <input type="date" id="ngay_tao" name="ngay_tao" class="form-control"
                                    value="{{ request('ngay_tao') }}">
                              </div>

                              <div class="form-group mb-2">
                                 <label class="d-block">&nbsp;</label>
                                 <button type="submit" class="btn btn-success">Tìm nâng cao</button>
                                 <a href="{{ route('admin.books.index') }}" class="btn btn-secondary ml-2">Reset</a>
                              </div>
                           </div>
                        </form>
                     </div>

                     @if ($books->isEmpty())
                        <p>Không có sách nào.</p>
                     @else
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>Mã sách</th>
                                 <th>Hình ảnh</th> 
                                 <th>Tên sách</th>
                                 <th>Loại SP</th>
                                 <th>Slug</th>
                                 <th>Lớp</th> {{-- Đã thay thế cho Danh mục --}}
                                 <th>Tác giả</th>
                                 <th>Giá bìa</th>
                                 <th>Chiết khấu (%)</th> {{-- thêm mới --}}
                                 <th>Nhà Xuất Bản</th> {{-- thêm mới --}}
                                 <th>Số lượng</th>
                                 <th>Lượt Mua</th>
                                 <th>Ngày tạo</th>
                                 <th>Hành động</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($books as $book)
                                 <tr>
                                    <td>{{ $book->MaSach }}</td>
                                    <td>
                                       @if ($book->HinhAnh)
                                          <img src="{{ asset('uploads/books/' . $book->HinhAnh) }}" alt="Hình ảnh" width="100">
                                       @else
                                          <span>Không có</span>
                                       @endif
                                    </td>
                                    <td>{{ $book->TenSach }}</td>
                                    <td>{{ $book->LoaiSanPham == 'sach_giao_khoa' ? 'SGK' : 'STK' }}</td>
                                    <td>{{ $book->slug }}</td>
                                    <td>{{ $book->Lop ?? 'Không có' }}</td> {{-- Trường Lớp --}}
                                    <td>{{ $book->TacGia }}</td>
                                    <td>{{ number_format($book->GiaBia, 0, ',', '.') }} đ</td>
                                    <td>{{ $book->chiet_khau ?? 0 }}%</td> {{-- chiết khấu --}}
                                    <td>{{ $book->nhaxuatban->ten ?? 'Không rõ' }}</td> {{-- nhà xuất bản --}}
                                    <td>{{ $book->SoLuong }}</td>
                                    <td>{{ $book->LuotMua }}</td>
                                    <td>{{ $book->created_at }}</td>
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 6px;">
                                            <a href="{{ route('admin.books.edit', $book->MaSach) }}" class="action-btn" data-toggle="tooltip" title="Sửa">
                                                <i class="ri-pencil-line"></i>
                                            </a>

                                            <!-- Nút Xóa mở modal -->
                                            <button type="button"
                                                    class="action-btn btn-delete"
                                                    data-id="{{ $book->MaSach }}"
                                                    data-toggle="tooltip"
                                                    title="Xóa">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>

                                            <a href="{{ route('admin.books.show', $book->MaSach) }}" class="action-btn" data-toggle="tooltip" title="Xem chi tiết">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <!-- Modal xác nhận xóa -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa sách này không?
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

                     <!-- Phân trang -->
                     <div class="d-flex justify-content-center">
                        {{ $books->links('pagination::bootstrap-4') }} 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- JS Tìm kiếm nâng cao -->
<script>
   document.getElementById('advanced-search-btn').addEventListener('click', function () {
      const form = document.getElementById('advanced-search-form');
      form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
   });
</script>
@endsection
<!-- đoạn scripts này dùng để gán action đúng vào form trong modal -->
@section('scripts')
<script>
   document.addEventListener('DOMContentLoaded', function () {
      const deleteButtons = document.querySelectorAll('.btn-delete');
      const deleteForm = document.getElementById('deleteForm');

      deleteButtons.forEach(button => {
         button.addEventListener('click', function () {
            const maSach = this.getAttribute('data-id');
            const url = "{{ route('admin.books.destroy', ':id') }}".replace(':id', maSach);
            deleteForm.setAttribute('action', url);

            // Hiển thị modal
            $('#deleteModal').modal('show');
         });
      });
   });
</script>
@endsection
