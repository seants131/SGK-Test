<!-- resources/views/admin/danhmucs/create.blade.php -->
@extends('layouts.admin')

@section('content')
   
 <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Thêm danh mục</h4>
                        </div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                         
                        <div class="iq-card-body">
                            <form method="POST" action="{{ route('admin.danhmucs.store') }}">
                                @csrf

                                <label for="name">Tên danh mục</label>
                                <input type="text" name="name" id="name" required>

                                <label for="parent_id">Danh mục cha</label>
                                <select name="parent_id" id="parent_id">
                                    <option value="">Không có</option>
                                    @foreach($danhmucs as $danhmuc)
                                        <option value="{{ $danhmuc->id }}">{{ $danhmuc->name }}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-success">Tạo danh mục</button>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection
