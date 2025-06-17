<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCheckoutController extends Controller
{
    public function gioHang()
    {
        return view('user.thanh_toan.gio_hang');
    }

    public function diaChi()
    {
        return view('user.thanh_toan.dia_chi');
    }

    public function phuongThucThanhToan()
    {
        return view('user.thanh_toan.pt_thanh_toan');
    }

    public function xacNhan()
    {
        return view('user.thanh_toan.xac_nhan');
    }
    public function test()
    {
        return view('user.thanh_toan.test');
    }
}