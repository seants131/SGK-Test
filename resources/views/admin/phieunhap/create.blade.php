@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Tạo phiếu nhập mới</h4>
                  </div>
               </div>

               {{-- Hiển thị lỗi session --}}
               @if (session('error'))
               <div class="alert alert-danger">{{ session('error') }}</div>
               @endif

               {{-- Hiển thị lỗi validate --}}
               @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif

               <form action="{{ route('admin.phieunhap.store') }}" method="POST">
                  @csrf
                  <a href="{{ route('admin.phieunhap.index') }}" class="close-form-button" title="Đóng">&times;</a>

                  <div class="form-group">
                     <label for="ngay_nhap">Ngày nhập</label>
                     <input type="date" name="ngay_nhap" class="form-control" value="{{ old('ngay_nhap', date('Y-m-d')) }}" required>
                  </div>

                  <hr>
                  <h5>Danh sách sách nhập</h5>

                  <table class="table table-bordered" id="table-sach">
                     <thead class="thead-light">
                        <tr>
                           <th>Nhà xuất bản</th>
                           <th>Sách</th>
                           <th>Số lượng</th>
                           <th>Giá bìa</th>
                           <th>Chiết khấu (%)</th>
                           <th>Thành tiền</th>
                           <th>
                              <button type="button" class="btn btn-success btn-sm" onclick="addRow()">+</button>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <select class="form-control nxb-select" required>
                                 <option value="">-- Chọn NXB --</option>
                                 @foreach ($nhaXuatBans as $nxb)
                                 <option value="{{ $nxb->id }}">{{ $nxb->ten }}</option>
                                 @endforeach
                              </select>
                           </td>
                           <td>
                              <select name="sach_id[]" class="form-control sach-select" required disabled>
                                 <option value="">-- Chọn sách --</option>
                              </select>
                           </td>
                           <td><input type="number" name="so_luong[]" class="form-control so_luong" min="0" value="0" required></td>
                           <td><input type="number" name="gia_nhap[]" class="form-control gia_nhap" readonly></td>
                           <td><input type="number" name="chiet_khau[]" class="form-control chiet_khau" min="0" max="100" value="0"></td>
                           <td><input type="text" class="form-control thanh_tien" readonly value="0"></td>
                           <td>
                              <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button>
                           </td>
                        </tr>
                     </tbody>
                  </table>

                  <div class="form-group d-flex justify-content-between">
                     <button type="submit" class="btn btn-success">Lưu phiếu nhập</button>
                     <a href="{{ route('admin.phieunhap.index') }}" class="btn btn-secondary">← Trở về</a>
                  </div>
               </form>

               @section('scripts')
               <script>
                  const allBooks = @json($sachs);

                  function calculateRow(row) {
                     const soLuong = parseFloat(row.querySelector('.so_luong').value) || 0;
                     const giaBia = parseFloat(row.querySelector('.gia_nhap').value) || 0;
                     const chietKhau = parseFloat(row.querySelector('.chiet_khau').value) || 0;
                     const thanhTien = giaBia * soLuong * (1 - chietKhau / 100);
                     row.querySelector('.thanh_tien').value = thanhTien.toLocaleString('vi-VN');
                  }

                  function attachEventHandlers(row) {
                     const nxbSelect = row.querySelector('.nxb-select');
                     const sachSelect = row.querySelector('.sach-select');
                     const giaInput = row.querySelector('.gia_nhap');
                     const ckInput = row.querySelector('.chiet_khau');

                     nxbSelect.addEventListener('change', function () {
                        const nxbId = this.value;
                        if (!nxbId) {
                           sachSelect.innerHTML = '<option value="">-- Chọn sách --</option>';
                           sachSelect.disabled = true;
                           return;
                        }

                        const filteredBooks = allBooks.filter(book => book.nha_xuat_ban_id == nxbId);
                        const options = filteredBooks.map(book =>
                           `<option value="${book.MaSach}" data-giabia="${book.GiaBia}" data-chietkhau="${book.chiet_khau}">
                              ${book.TenSach}
                            </option>`
                        ).join('');

                        sachSelect.innerHTML = '<option value="">-- Chọn sách --</option>' + options;
                        sachSelect.disabled = false;
                     });

                     sachSelect.addEventListener('change', function () {
                        const selected = this.options[this.selectedIndex];
                        giaInput.value = selected.getAttribute('data-giabia') || 0;
                        ckInput.value = selected.getAttribute('data-chietkhau') || 0;
                        calculateRow(row);
                     });

                     row.querySelectorAll('.so_luong, .chiet_khau').forEach(input => {
                        input.addEventListener('input', () => calculateRow(row));
                     });
                  }

                  function addRow() {
                     const table = document.querySelector('#table-sach tbody');
                     const row = table.rows[0].cloneNode(true);

                     // Reset input fields
                     row.querySelectorAll('input').forEach(input => {
                        input.value = (input.classList.contains('so_luong') ? 1 : 0);
                     });
                     row.querySelector('.thanh_tien').value = '0';
                     row.querySelector('.gia_nhap').value = '';
                     row.querySelector('.chiet_khau').value = '0';

                     row.querySelector('.nxb-select').selectedIndex = 0;
                     const sachSelect = row.querySelector('.sach-select');
                     sachSelect.innerHTML = '<option value="">-- Chọn sách --</option>';
                     sachSelect.disabled = true;

                     table.appendChild(row);
                     attachEventHandlers(row);
                  }

                  function removeRow(button) {
                     const row = button.closest('tr');
                     const table = row.parentNode;
                     if (table.rows.length > 1) {
                        row.remove();
                     } else {
                        alert('Cần nhập ít nhất 1 sách.');
                     }
                  }

                  document.addEventListener('DOMContentLoaded', () => {
                     document.querySelectorAll('#table-sach tbody tr').forEach(row => {
                        attachEventHandlers(row);
                     });
                  });
               </script>
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
                  }

                  form {
                     background-color: #ffffff;
                     padding: 15px;
                     border-radius: 8px;
                     box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                     max-width: 1250px;
                     margin: auto;
                  }

                  input, select {
                     width: 100%;
                     padding: 10px;
                     font-size: 16px;
                     border: 1px solid #ddd;
                     border-radius: 4px;
                  }

                  th, td {
                     vertical-align: middle;
                  }

                  .btn-sm {
                     font-size: 14px;
                     padding: 4px 8px;
                  }
               </style>
               @endsection

            </div>
         </div>
      </div>
   </div>
</div>
@endsection
