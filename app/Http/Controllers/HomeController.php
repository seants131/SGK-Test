<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home.index');
    }
    public function dangNhap()
    {
        return view('user.home.dang_nhap');
    }
    public function postDangNhap()
    {
        return view('user.home.dang_nhap');
    }
    public function dangXuat()
    {
        return view('user.home.dang_nhap');
    }
    public function dangKy()
    {
        return view('user.home.dang_nhap');
    }
    public function postDangKy()
    {
        return view('user.home.dang_nhap');
    }
    public function contact()
    {
        return view('user.home.contact');
    }
    public function cart()
    {
        return view('user.cart.thanh_toan');
    }
}
