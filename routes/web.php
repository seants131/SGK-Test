<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;

//user
Route::get('/', [HomeController::class, 'index'])->name('user.welcome');
// sign_in_up
Route::get('/sign-in', [UserAuthController::class, 'showSigninForm'])->name('user.sign-in');
Route::get('/sign-up', [UserAuthController::class, 'showSignupForm'])->name('user.sign-up');

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/categories', [DanhMucController::class, 'index'])->name('admin.categories');
Route::get('/admin/books', [BookController::class, 'index'])->name('admin.books');
Route::get('/admin/author', [AuthorController::class, 'index'])->name('admin.author');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('danhmucs', DanhMucController::class);
    Route::resource('books', BookController::class);
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