<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhieuNhapController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserCheckoutController;
use App\Http\Controllers\UserController;
use App\Mail\OrderConfirmationMail;

// Redirect login route
Route::get('/login', function () {
    return redirect()->route('admin.sign-in'); 
})->name('login');

/*
|--------------------------------------------------------------------------
| User Authentication
|--------------------------------------------------------------------------
*/

// User sign up
Route::get('/sign-up', [UserAuthController::class, 'showSignupForm'])->name('user.sign-up');
Route::post('/sign-up', [UserAuthController::class, 'signup'])->name('user.sign-up.submit');

// User sign in
Route::get('/sign-in', [UserAuthController::class, 'showSigninForm'])->name('user.sign-in');
Route::post('/sign-in', [UserAuthController::class, 'signin'])->name('user.sign-in.submit');

/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.post');

Route::get('/admin/sign-in', [AdminAuthController::class, 'showSigninForm'])->name('admin.sign-in');
Route::get('/admin/login', [AdminAuthController::class, 'showSigninForm'])->name('admin.login');

Route::post('/admin/sign-in', [AdminAuthController::class, 'signin'])->name('admin.signin');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Logout Route (Shared)
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('admin.sign-in')->with('success', 'Đăng xuất thành công');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('books', BookController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('khachhang', KhachHangController::class);
    Route::resource('lienhe', LienHeController::class);
    Route::resource('phieunhap', PhieuNhapController::class);

    Route::get('/profile', [AdminProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [AdminProfileController::class, 'changePasswordForm'])->name('profile.password.form');
    Route::post('/profile/change-password', [AdminProfileController::class, 'changePassword'])->name('profile.password');
});

/*
|--------------------------------------------------------------------------
| User-facing Pages
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('user.home.index');

// Categories
Route::get('/categories', [HomeController::class, 'categories'])->name('user.categories.index');
Route::get('/categories/{id}', [HomeController::class, 'categoryDetail'])->name('user.categories.detail');

// Authors
Route::get('/authors', [HomeController::class, 'authors'])->name('user.authors.index');
Route::get('/authors/{id}', [HomeController::class, 'authorDetail'])->name('user.authors.detail');

// Contact
Route::get('/contact', [HomeController::class, 'contact'])->name('user.contact.index');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('user.contact.send');

// About
Route::get('/about', [HomeController::class, 'about'])->name('user.about.index');

// Cart in HomeController
Route::get('/cart', [HomeController::class, 'cart'])->name('user.cart.index');
Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('user.cart.add');

// User Profile
Route::get('/profile', [UserController::class, 'index'])->name('user.profile.index');

// Book PDF
Route::get('/books/pdf', [HomeController::class, 'bookPDF'])->name('user.book.pdf');

// Book detail
Route::get('/sach/{slug}', [HomeController::class, 'bookDetail'])->name('user.books.detail');

/*
|--------------------------------------------------------------------------
| User Cart (separate CartController)
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update-ajax', [CartController::class, 'updateAjax'])->name('cart.update.ajax');
Route::post('/cart/remove-ajax', [CartController::class, 'removeAjax'])->name('cart.remove.ajax');

/*
|--------------------------------------------------------------------------
| Checkout
|--------------------------------------------------------------------------
*/

Route::prefix('thanh-toan')->name('thanh_toan.')->group(function () {
    Route::get('/test', [UserCheckoutController::class, 'test'])->name('test');
    Route::get('/gio-hang', [UserCheckoutController::class, 'gioHang'])->name('gio_hang');
    Route::get('/dia-chi', [UserCheckoutController::class, 'diaChi'])->name('dia_chi');
    Route::get('/phuong-thuc-thanh-toan', [UserCheckoutController::class, 'phuongThucThanhToan'])->name('pt_thanh_toan');
    // Route::get('/xac-nhan', [UserCheckoutController::class, 'xacNhan'])->name('xac_nhan');
});

Route::middleware(['web'])->group(function () {
    Route::get('/checkout/address', [UserCheckoutController::class, 'showAddressForm'])->name('checkout.address');
    Route::post('/checkout/submit', [UserCheckoutController::class, 'submitAddress'])->name('checkout.submit');
    Route::get('/checkout/payment', [UserCheckoutController::class, 'goToPayment'])->name('checkout.payment');
    Route::post('/checkout/place-order', [UserCheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
});

/*
|--------------------------------------------------------------------------
| User Account Area (auth protected)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile.index');
    Route::get('/orders', [UserController::class, 'orders'])->name('user.orders.index');
    Route::get('/orders/{id}', [UserController::class, 'orderDetail'])->name('user.orders.detail');
});

/*
|--------------------------------------------------------------------------
| Signup test route
|--------------------------------------------------------------------------
*/

Route::get('/signup', [HomeController::class, 'dangKy'])->name('user.auth.dang_ky');
// Route::get('/login', [HomeController::class, 'dangNhap'])->name('user.auth.dang_nhap');

/*
|--------------------------------------------------------------------------
| Test Mail
|--------------------------------------------------------------------------
*/

Route::get('/send-order-mail', function () {
    $order = [
        'id' => 1234,
        'date' => now()->format('d/m/Y'),
        'items' => [
            ['name' => 'Sách toán 11 chân trời', 'qty' => 2, 'price' => 50000],
            ['name' => 'Sách ngữ văn chân trời', 'qty' => 1, 'price' => 75000],
        ],
        'total' => 2 * 50000 + 1 * 75000,
    ];

    Mail::to('hellotoilaquan@gmail.com')->send(new OrderConfirmationMail($order));

    return 'Đã gửi email xác nhận đơn hàng!';
});
