@extends('layouts.sign_in_up.sign')

@section('content')
<div class="container">
    <h2>Chỉnh sửa hồ sơ quản trị viên</h2>
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label>Avatar</label>
            <input type="file" name="avatar" class="form-control-file">
            @if ($user->avatar)
                <img src="{{ asset($user->avatar) }}" width="80" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.profile.show') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection