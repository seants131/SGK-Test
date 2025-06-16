<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\DonHang;
use App\Models\KhachHang;

class AdminController extends Controller
{
    public function index()
    {
        $totalBooks = Sach::count();
        $totalOrders = DonHang::count();
        $totalUsers = KhachHang::count();
        $pendingOrders = DonHang::where('trang_thai', 'cho_xu_ly')->count();
        $orders = DonHang::with('khachHang')->orderByDesc('ngay_mua')->paginate(10); // hoặc ->take(5)->get() nếu chỉ cần 5 đơn gần nhất
        return view('admin.index', compact('totalBooks', 'totalOrders','totalUsers', 'pendingOrders','orders'));
    }
}
