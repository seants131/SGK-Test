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
        return view('admin.index', compact('totalBooks', 'totalOrders','totalUsers'));
    }
}
