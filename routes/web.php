<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserCheckoutController ;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

//user
// Route::get('/', [HomeController::class, 'index'])->name('user.welcome');
// sign_in_up
Route::get('/sign-in', [UserAuthController::class, 'showSigninForm'])->name('user.sign-in');
Route::get('/sign-up', [UserAuthController::class, 'showSignupForm'])->name('user.sign-up');

// Trang đăng ký của admin. Test chức năng đăng ký
Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.post');
// Trang đăng nhập của admin. Test chức năng đăng nhập
Route::get('/admin/sign-in', [AdminAuthController::class, 'showSigninForm'])->name('admin.sign-in');
// Xử lý đăng nhập của admin
Route::post('/admin/sign-in', [AdminAuthController::class, 'signin'])->name('admin.signin');
// Trang đăng xuất của admin
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
// Auth::routes(); cái này của người dùng mà chưa bt làm.
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('admin.sign-in')->with('success', 'Đăng xuất thành công');
})->name('logout');

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/categories', [DanhMucController::class, 'index'])->name('admin.categories');
Route::get('/admin/books', [BookController::class, 'index'])->name('admin.books');
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('danhmucs', DanhMucController::class);
    Route::resource('books', BookController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('khachhang', KhachHangController::class);
    Route::get('/profile', [AdminProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [AdminProfileController::class, 'changePasswordForm'])->name('profile.password.form');
    Route::post('/profile/change-password', [AdminProfileController::class, 'changePassword'])->name('profile.password');
});

Route::get('/signup', [HomeController::class, 'dangKy'])->name('user.auth.dang_ky');
Route::get('/login', [HomeController::class, 'dangNhap'])->name('user.auth.dang_nhap');

Route::get('/', [HomeController::class, 'index'])->name('user.home.index');
Route::get('/books', [HomeController::class, 'books'])->name('user.books.index');
// Route::get('/books/{id}', [HomeController::class, 'bookDetail'])->name('user.books.detail');
Route::get('/books/detail', [HomeController::class, 'bookDetail'])->name('user.books.detail');
Route::get('/categories', [HomeController::class, 'categories'])->name('user.categories.index');
Route::get('/categories/{id}', [HomeController::class, 'categoryDetail'])->name('user.categories.detail');
Route::get('/authors', [HomeController::class, 'authors'])->name('user.authors.index');
Route::get('/authors/{id}', [HomeController::class, 'authorDetail'])->name('user.authors.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('user.contact.index');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('user.contact.send');
Route::get('/about', [HomeController::class, 'about'])->name('user.about.index');
Route::get('/cart', [HomeController::class, 'cart'])->name('user.cart.index');
Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('user.cart.add');  
Route::get('/profile',[UserController::class,'index'])->name('user.profile.index');
Route::get('/books/pdf',[HomeController::class,'bookPDF'])->name('user.book.pdf');

Route::prefix('thanh-toan')->name('thanh_toan.')->group(function () {
    Route::get('/test', [UserCheckoutController::class, 'test'])->name('test');
    Route::get('/gio-hang', [UserCheckoutController::class, 'gioHang'])->name('gio_hang');
    Route::get('/dia-chi', [UserCheckoutController::class, 'diaChi'])->name('dia_chi');
    Route::get('/phuong-thuc-thanh-toan', [UserCheckoutController::class, 'phuongThucThanhToan'])->name('pt_thanh_toan');
    // Route::get('/xac-nhan', [UserCheckoutController::class, 'xacNhan'])->name('xac_nhan');
});

Route::get('/send-order-mail', function () {
    $order = [
        'id' => 1234,
        'date' => now()->format('d/m/Y'),
        'items' => [
            ['name' => 'Sách toán 11 chân trờitrời', 'qty' => 2, 'price' => 50000],
            ['name' => 'Sách ngữ văn chân trời', 'qty' => 1, 'price' => 75000],
        ],
        'total' => 2 * 50000 + 1 * 75000,
    ];

    Mail::to('hellotoilaquan@gmail.com')->send(new OrderConfirmationMail($order));

    return 'Đã gửi email xác nhận đơn hàng!';
});

use App\Http\Controllers\UserCartController;

Route::get('/gio-hang', [UserCartController::class, 'index'])->name('cart.index');
Route::post('/gio-hang/them', [UserCartController::class, 'add'])->name('cart.add');
Route::post('/gio-hang/xoa', [UserCartController::class, 'remove'])->name('cart.remove');
