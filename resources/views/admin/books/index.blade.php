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
                              @if ($books->isEmpty())
                                  <p>Không có sách nào.</p>
                              @else
                                  <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>Mã sách</th>
                                              <th>Hình ảnh</th> 
                                              <th>Tên sách</th>
                                              <th>Danh mục</th>
                                              <th>Giá bán</th>
                                              <th>Số lượng</th>
                                              <th>Hành động</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($books as $book)
                                              <tr>
                                                  <td>{{ $book->MaSach }}</td> <!-- Hiển thị mã sách -->
                                                  <td>
                                                      @if ($book->HinhAnh)
                                                          <img src="{{ asset('uploads/books/' . $book->HinhAnh) }}" alt="Hình ảnh" width="100">
                                                          {{-- cái ở dưới để dùng link trang khác --}}
                                                          {{-- <img src="{{ asset($book->HinhAnh) }}" alt="Hình ảnh" width="100">   --}} 
                                                      @else
                                                          <span>Không có</span>
                                                      @endif
                                                  </td>
                                                  <td>{{ $book->TenSach }}</td> <!-- Hiển thị tên sách -->
                                                  <td>{{ $book->danhmuc->name ?? 'Không có' }}</td>
                                                  <td>{{ $book->GiaBan }}</td> <!-- Hiển thị giá bán -->
                                                  <td>{{ $book->SoLuong }}</td> <!-- Hiển thị số lượng -->
                                                  <td>
                                                      <a href="{{ route('admin.books.edit', $book->MaSach) }}" class="btn btn-warning">Sửa</a>
                                                      <form action="{{ route('admin.books.destroy', $book->MaSach) }}" method="POST"
                                                          style="display:inline;" class="delete-form">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="btn btn-danger">Xóa</button>
                                                      </form>
                                                  </td>
                                              </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                              @endif
                          </div>
                          <script>
                              // Lắng nghe sự kiện "submit" của các form xóa
                              document.addEventListener('DOMContentLoaded', function() {
                                  const deleteForms = document.querySelectorAll('.delete-form');

                                  deleteForms.forEach(form => {
                                      form.addEventListener('submit', function(e) {
                                          // Hiển thị hộp thoại xác nhận
                                          const confirmDelete = confirm('Bạn có chắc chắn muốn xóa sách này không?');

                                          // Nếu người dùng chọn Cancel, ngăn form gửi đi
                                          if (!confirmDelete) {
                                              e.preventDefault();
                                          }
                                      });
                                  });
                              });
                          </script>
                          </table>
                           <!-- Đặt phân trang bên ngoài vòng lặp -->
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
      <!-- Wrapper END -->
@endsection
