<!-- resources/views/admin/sign-in.blade.php -->

@extends('layouts.sign_in_up.sign')<!-- Layout của bạn, thay đổi nếu cần -->

@section('content')
<div class="container">
    <h2>Đăng nhập Admin</h2>
    <form action="{{ route('admin.signin') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Đăng nhập</button>
    </form>

    <!-- Hiển thị thông báo lỗi nếu có -->
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
