@extends('layouts.sign_in_up.sign')

@section('content')
<div class="container">
    <h2>Đổi mật khẩu</h2>
    <form method="POST" action="{{ route('admin.profile.password') }}">
        @csrf
        <div class="form-group">
            <label>Mật khẩu hiện tại</label>
            <input type="password" name="current_password" class="form-control" required>
            @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label>Mật khẩu mới</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label>Xác nhận mật khẩu mới</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('admin.profile.show') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection