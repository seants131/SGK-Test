@extends('layouts.sign_in_up.sign')

@section('content')
<div class="container">
    <h2>Hồ sơ Quản trị viên</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-md-3">
            <img src="{{ asset($user->avatar ?? 'images/user/default.jpg') }}" class="img-fluid rounded-circle" alt="avatar">
        </div>
        <div class="col-md-9">
            <p><b>Tên:</b> {{ $user->name }}</p>
            <p><b>Email:</b> {{ $user->email }}</p>
            <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Chỉnh sửa thông tin</a><br>
            <a href="{{ route('admin.profile.password.form') }}" class="btn btn-warning mt-2">Đổi mật khẩu</a>
        </div>
    </div>
</div>
@endsection