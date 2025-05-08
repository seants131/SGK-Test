<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Nếu bạn có model Admin

class AdminAuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showSigninForm()
    {
        return view('admin.sign-in');
    }

    // Xử lý đăng nhập admin
    public function signin(Request $request)
    {
        // Validate dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Kiểm tra thông tin đăng nhập của admin
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->route('admin.index'); // Chuyển đến dashboard admin
        }

        // Nếu đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    // Đăng xuất admin
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.sign-in');
    }
}

