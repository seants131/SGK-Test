<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\DanhMuc;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('user.home.index');
    // }
    public function index()
    {
        return view('user.home.index');
        // For "New Releases Slider" - let's take the 5 most recently added books' images
        // Assuming these are promotional banners or covers of very new books
        // If these are specific banner images, they might need a different model/table
        $newReleaseSlides = Sach::whereNotNull('HinhAnh')
                                ->orderBy('created_at', 'desc')
                                ->take(9) // The slider shows 9 items
                                ->get();

        // For "Gợi ý cho bạn" - take 12 books, perhaps ordered by creation date or randomly
        $suggestedBooks = Sach::orderBy('created_at', 'desc')->take(12)->get();

        // For "Best Seller" - book with the most 'LuotMua'
        $bestSellerBook = Sach::orderBy('LuotMua', 'desc')->first();

        // For "Nhà Sách TV" - top-level categories with book counts
        $categoriesWithBookCounts = DanhMuc::withCount('books')->whereNull('parent_id')->take(6)->get();

        // For "Sách yêu thích" - let's take 4 books with high 'LuotMua'
        $favoriteBooks = Sach::orderBy('LuotMua', 'desc')->take(4)->get();

        return view('user.home.index', compact('newReleaseSlides', 'suggestedBooks', 'bestSellerBook', 'categoriesWithBookCounts', 'favoriteBooks'));
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
