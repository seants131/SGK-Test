<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\DonHang;

class UserController extends Controller
{
    // Trang thông tin cá nhân
    public function index()
    {
        $user = Auth::user();
        return view('user.profile.index', compact('user'));
    }

    // Danh sách đơn hàng
    public function orders()
    {
        $orders = DonHang::where('khach_hang_id', Auth::id())->orderByDesc('ngay_mua')->get();
        return view('user.orders.index', compact('orders'));
    }

    // Chi tiết đơn hàng
    public function orderDetail($id)
    {
        $order = DonHang::where('khach_hang_id', Auth::id())->where('id', $id)->firstOrFail();
        return view('user.orders.detail', compact('order'));
    }
}
