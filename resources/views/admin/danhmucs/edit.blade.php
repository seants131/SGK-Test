@extends('layouts.admin')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Sửa danh mục</h4>
                        </div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                         
                        <div class="iq-card-body">
                        <form action="{{ route('admin.danhmucs.update', $danhmuc->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Tên danh mục -->
                            <label for="name">Tên danh mục:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $danhmuc->name) }}" required>

                            <!-- Danh mục cha -->
                            <label for="parent_id">Danh mục cha:</label>
                            <select name="parent_id" id="parent_id">
                                <option value="">Chọn danh mục cha</option>
                                @foreach($danhmucs as $cat)
                                    <option value="{{ $cat->id }}" 
                                        {{ old('parent_id', $danhmuc->parent_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-warning">Cập nhật danh mục</button>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    

    
@endsection
