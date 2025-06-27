<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedMail; // Tạo mailable này
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\DonHang; // Thêm dòng này
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

    public function placeOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        // Lấy thông tin từ session
        $cart = session('cart', []);
        $address = session('shipping_address', []);
        $cart_total = 0;
        $tong_so_luong = 0;
        foreach ($cart as $item) {
            $cart_total += $item['price'] * $item['quantity'];
            $tong_so_luong += $item['quantity'];
        }

        // Nếu có giảm giá hoặc khuyến mãi, lấy từ session hoặc tính toán
        $giam_gia = session('giam_gia', 0);
        $khuyen_mai_id = session('khuyen_mai_id', null);

        // Tạo đơn hàng (hoa_don)
        $donHang = DonHang::create([
            'user_id' => Auth::id(), // null nếu khách vãng lai
            'ngay_mua' => now(),
            'trang_thai' => 'pending',
            'hinh_thuc_thanh_toan' => $request->payment_method,
            'giam_gia' => $giam_gia,
            'tong_tien' => $cart_total,
            'tong_so_luong' => $tong_so_luong,
            'khuyen_mai_id' => $khuyen_mai_id,
        ]);

        // Lưu chi tiết hóa đơn
        foreach ($cart as $item) {
            ChiTietHoaDon::create([
                'hoa_don_id' => $donHang->id,
                'sach_id' => $item['id'],
                'so_luong' => $item['quantity'],
                'don_gia' => $item['price'],
                'thanh_tien' => $item['price'] * $item['quantity'],
            ]);
        }

        // Gửi email xác nhận đơn hàng
        Mail::to($address['email'])->send(new OrderPlacedMail($donHang, $cart));

        // Xóa giỏ hàng khỏi session
        session()->forget('cart');

        return redirect()->route('checkout.thankyou')->with('success', 'Đặt hàng thành công! Vui lòng kiểm tra email.');
    }
}
