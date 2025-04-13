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
        return view('user.auth.dang_nhap');
    }
    public function postDangNhap()
    {
        return view('user.auth.dang_nhap');
    }
    public function dangXuat()
    {
        return view('user.home.dang_nhap');
    }
    public function dangKy()
    {
        return view('user.auth.dang_ky');
    }
    public function postDangKy()
    {
        return view('user.home.dang_ky');
    }
    public function contact()
    {
        return view('user.home.contact');
    }
    public function bookDetail(){
        return view('user.product.chi_tiet_sach');
    }
    public function cart(){
        return view('user.cart.thanh_toan');
    }
    public function bookPDF(){
        return view('user.home.book-pdf');
    }
}
