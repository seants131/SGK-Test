@extends('layouts.sign_in_up.sign')

@section('content')
<div class="container">
    <h2>Đăng ký Admin</h2>
    <form method="POST" action="{{ route('admin.register.post') }}">
        @csrf
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Nhập lại mật khẩu</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Đăng ký</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
