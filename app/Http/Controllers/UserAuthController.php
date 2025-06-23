<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    // Hiển thị form đăng ký
    public function showSignupForm()
    {
        return view('user.auth.dang_ky');
    }

    // Xử lý đăng ký
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:nguoi_dung,username',
            'email' => 'required|email|unique:nguoi_dung,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = KhachHang::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'khach',
        ]);

        Auth::login($user);

        return redirect()->route('user.home.index');
    }

    // Hiển thị form đăng nhập
    public function showSigninForm()
    {
        return view('user.auth.dang_nhap');
    }

    // Xử lý đăng nhập
    public function signin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            }
            return redirect()->route('user.home.index');
        }
        
        return back()->withErrors([
            'username' => 'Tài khoản hoặc mật khẩu không đúng.',
        ])->withInput();
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.sign-in');
    }
}
