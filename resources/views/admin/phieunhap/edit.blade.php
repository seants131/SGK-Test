@extends('layouts.admin')

@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Chỉnh sửa phiếu nhập #{{ $phieunhap->id }}</h4>
                  </div>
                  <a href="{{ route('admin.phieunhap.index') }}" class="close-form-button" title="Đóng">&times;</a>
               </div>

               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif

               <form action="{{ route('admin.phieunhap.update', $phieunhap->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="form-group">
                     <label for="ngay_nhap">Ngày nhập</label>
                     <input type="date" name="ngay_nhap" class="form-control" value="{{ old('ngay_nhap', $phieunhap->ngay_nhap) }}" required>
                  </div>

                  <hr>
                  <h5>Cập nhật danh sách sách nhập</h5>

                  <table class="table table-bordered" id="table-sach">
                     <thead class="thead-light">
                        <tr>
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
                        @foreach ($phieunhap->chiTietNhapSach as $ct)
                        <tr>
                           <td>
                              <select name="sach_id[]" class="form-control sach-select" required>
                                 <option value="">-- Chọn sách --</option>
                                 @foreach ($sachs as $sach)
                                    <option value="{{ $sach->MaSach }}" data-giabia="{{ $sach->GiaBia }}" {{ $sach->MaSach == $ct->sach_id ? 'selected' : '' }}>{{ $sach->TenSach }}</option>
                                 @endforeach
                              </select>
                           </td>
                           <td><input type="number" name="so_luong[]" class="form-control so_luong" min="1" value="{{ $ct->so_luong }}" required></td>
                           <td><input type="number" name="gia_nhap[]" class="form-control gia_nhap" readonly></td>
                           <td><input type="number" name="chiet_khau[]" class="form-control chiet_khau" min="0" max="100" value="{{ $ct->chiet_khau }}"></td>
                           <td><input type="text" class="form-control thanh_tien" readonly value="0"></td>
                           <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button></td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>

                  <div class="form-group d-flex justify-content-between">
                     <button type="submit" class="btn btn-primary">Cập nhật phiếu nhập</button>
                     <a href="{{ route('admin.phieunhap.index') }}" class="btn btn-secondary">← Trở về</a>
                  </div>
               </form>

               @section('scripts')
               <script>
                  function calculateRow(row) {
                     const soLuong = parseFloat(row.querySelector('.so_luong').value) || 0;
                     const giaBia = parseFloat(row.querySelector('.gia_nhap').value) || 0;
                     const chietKhau = parseFloat(row.querySelector('.chiet_khau').value) || 0;
                     const thanhTien = giaBia * soLuong * (1 - chietKhau / 100);
                     row.querySelector('.thanh_tien').value = thanhTien.toLocaleString('vi-VN');
                  }

                  function attachEventHandlers(row) {
                     const select = row.querySelector('.sach-select');
                     const giaInput = row.querySelector('.gia_nhap');

                     select.addEventListener('change', function () {
                        const selected = this.options[this.selectedIndex];
                        const giaBia = selected.getAttribute('data-giabia') || 0;
                        giaInput.value = giaBia;
                        calculateRow(row);
                     });

                     row.querySelectorAll('.so_luong, .chiet_khau').forEach(input => {
                        input.addEventListener('input', () => calculateRow(row));
                     });
                  }

                  function addRow() {
                     const table = document.querySelector('#table-sach tbody');
                     const row = table.rows[0].cloneNode(true);

                     row.querySelectorAll('input').forEach(input => input.value = input.name.includes('so_luong') ? 1 : 0);
                     row.querySelector('.thanh_tien').value = '0';
                     row.querySelector('.gia_nhap').value = '';
                     row.querySelector('.sach-select').selectedIndex = 0;

                     table.appendChild(row);
                     attachEventHandlers(row);
                  }

                  function removeRow(button) {
                     const row = button.closest('tr');
                     const table = row.parentNode;
                     if (table.rows.length > 1) {
                        row.remove();
                     } else {
                        alert('Cần có ít nhất 1 sách trong phiếu.');
                     }
                  }

                  document.addEventListener('DOMContentLoaded', () => {
                     document.querySelectorAll('#table-sach tbody tr').forEach(row => {
                        const selectedOption = row.querySelector('.sach-select').selectedOptions[0];
                        const giaBia = selectedOption.getAttribute('data-giabia') || 0;
                        row.querySelector('.gia_nhap').value = giaBia;
                        attachEventHandlers(row);
                        calculateRow(row);
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
