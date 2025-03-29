<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;



Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/categories', [DanhMucController::class, 'index'])->name('admin.categories');
Route::get('/admin/books', [BookController::class, 'index'])->name('admin.books');
Route::get('/admin/author', [AuthorController::class, 'index'])->name('admin.author');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('danhmucs', DanhMucController::class);
    Route::resource('books', BookController::class)->except(['show']);
});

Route::get('/', [HomeController::class, 'index'])->name('user.home.index');
Route::get('/books', [HomeController::class, 'books'])->name('user.books.index');
Route::get('/books/{id}', [HomeController::class, 'bookDetail'])->name('user.books.detail');
Route::get('/categories', [HomeController::class, 'categories'])->name('user.categories.index');
Route::get('/categories/{id}', [HomeController::class, 'categoryDetail'])->name('user.categories.detail');
Route::get('/authors', [HomeController::class, 'authors'])->name('user.authors.index');
Route::get('/authors/{id}', [HomeController::class, 'authorDetail'])->name('user.authors.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('user.contact.index');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('user.contact.send');
Route::get('/about', [HomeController::class, 'about'])->name('user.about.index');
Route::get('/cart', [HomeController::class, 'cart'])->name('user.cart.index');
Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('user.cart.add');  