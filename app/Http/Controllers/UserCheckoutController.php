<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCheckoutController extends Controller
{
    public function thanhToan(){
        return view('user.thanh_toan.thanh_toan');
    }
    public function diaChi()
    {
        return view('user.thanh_toan.dia_chi');
    }

    public function gioHang()
    {
        return view('user.thanh_toan.gio_hang');
    }

    public function phuongThucThanhToan()
    {
        return view('user.thanh_toan.pt_thanh_toan');
    }

    public function xacNhan()
    {
        return view('user.thanh_toan.xac_nhan');
    }
}