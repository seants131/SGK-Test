<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;

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

/*
|--------------------------------------------------------------------------
| Redirect & Auth
|--------------------------------------------------------------------------
*/

// Redirect mặc định đến trang đăng nhập admin
Route::get('/login', fn() => redirect()->route('admin.sign-in'))->name('login');

// ==== USER AUTH ====
Route::get('/sign-up', [UserAuthController::class, 'showSignupForm'])->name('user.sign-up');
Route::post('/sign-up', [UserAuthController::class, 'signup'])->name('user.sign-up');
Route::get('/sign-in', [UserAuthController::class, 'showSigninForm'])->name('user.sign-in');
Route::post('/sign-in', [UserAuthController::class, 'signin'])->name('user.sign-in');

// Logout user/admin (dùng chung)
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('admin.sign-in')->with('success', 'Đăng xuất thành công');
})->name('logout');

// ==== ADMIN AUTH ====
Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.post');
Route::get('/admin/sign-in', [AdminAuthController::class, 'showSigninForm'])->name('admin.sign-in');
Route::get('/admin/login', [AdminAuthController::class, 'showSigninForm']);
Route::post('/admin/sign-in', [AdminAuthController::class, 'signin'])->name('admin.signin');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Panel (middleware: auth)
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
| User Routes
|--------------------------------------------------------------------------
*/
// Trang chính
Route::get('/', [HomeController::class, 'index'])->name('user.home.index');
Route::get('/about', [HomeController::class, 'about'])->name('user.about.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('user.contact.index');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('user.contact.send');

// Danh mục
Route::get('/categories', [HomeController::class, 'categories'])->name('user.categories.index');
Route::get('/categories/{id}', [HomeController::class, 'categoryDetail'])->name('user.categories.detail');

// Tác giả
Route::get('/authors', [HomeController::class, 'authors'])->name('user.authors.index');
Route::get('/authors/{id}', [HomeController::class, 'authorDetail'])->name('user.authors.detail');

// Sách
Route::get('/sach/{slug}', [HomeController::class, 'bookDetail'])->name('user.books.detail');
Route::get('/books/pdf', [HomeController::class, 'bookPDF'])->name('user.book.pdf');

// Đăng ký nhanh
Route::get('/signup', [HomeController::class, 'dangKy'])->name('user.auth.dang_ky');

/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update-ajax', [CartController::class, 'updateAjax'])->name('cart.update.ajax');
Route::post('/cart/remove-ajax', [CartController::class, 'removeAjax'])->name('cart.remove.ajax');

/*
|--------------------------------------------------------------------------
| Thanh toán
|--------------------------------------------------------------------------
*/
Route::prefix('thanh-toan')->name('thanh_toan.')->group(function () {
    Route::get('/test', [UserCheckoutController::class, 'test'])->name('test');
    Route::get('/gio-hang', [UserCheckoutController::class, 'gioHang'])->name('gio_hang');
    Route::get('/dia-chi', [UserCheckoutController::class, 'diaChi'])->name('dia_chi');
    Route::get('/phuong-thuc-thanh-toan', [UserCheckoutController::class, 'phuongThucThanhToan'])->name('pt_thanh_toan');
    // Route::get('/xac-nhan', [UserCheckoutController::class, 'xacNhan'])->name('xac_nhan');
});

/*
|--------------------------------------------------------------------------
| Tài khoản người dùng (middleware: auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile.index');
    Route::get('/orders', [UserController::class, 'orders'])->name('user.orders.index');
    Route::get('/orders/{id}', [UserController::class, 'orderDetail'])->name('user.orders.detail');
});

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


Route::middleware(['web'])->group(function () {
    Route::get('/checkout/address', [UserCheckoutController::class, 'showAddressForm'])->name('checkout.address');
    Route::post('/checkout/submit', [UserCheckoutController::class, 'submitAddress'])->name('checkout.submit');
    Route::get('/checkout/payment', [UserCheckoutController::class, 'goToPayment'])->name('checkout.payment'); // Tùy vào flow bạn
});
