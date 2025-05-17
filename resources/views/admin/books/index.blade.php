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
                                            <label for="category_id">Danh mục</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Chọn danh mục</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                              <th>slug</th>
                                              <th>Danh mục</th>
                                              <th>Tác Giả</th>
                                              <th>Giá bán</th>
                                              <th>Số lượng</th>
                                              <th>Ngày tạo</th>
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
                                                  <td>{{ $book->slug }}</td>
                                                  <td>{{ $book->danhmuc->name ?? 'Không có' }}</td>
                                                  <td>{{ $book->TacGia }}</td>
                                                  <td>{{ number_format($book->GiaBan, 0, ',', '.') }} đ</td> <!-- Hiển thị giá bán, có thể đơn vi là đ hoặc vnd  tùy --> 
                                                  <td>{{ $book->SoLuong }}</td> <!-- Hiển thị số lượng -->
                                                  <td>{{ $book->created_at }}</td>
                                                  <td>
                                                    <div class="d-flex align-items-center" style="gap: 6px;">
                                                        <!-- Nút sửa -->
                                                        <a href="{{ route('admin.books.edit', $book->MaSach) }}"
                                                        class="action-btn" data-toggle="tooltip" title="Sửa">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>

                                                        <!-- Nút xóa -->
                                                        <form action="{{ route('admin.books.destroy', $book->MaSach) }}"
                                                            method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sách này không?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="action-btn" data-toggle="tooltip" title="Xóa">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>

                                                        <!-- Nút xem chi tiết -->
                                                        <a href="{{ route('admin.books.show', $book->MaSach) }}" class="action-btn" data-toggle="tooltip" title="Xem chi tiết">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </div>
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
       <!-- JS Tìm kiếm nâng cao -->
       <script>
        document.getElementById('advanced-search-btn').addEventListener('click', function() {
            const form = document.getElementById('advanced-search-form');
                form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
        });
        </script>
@endsection
