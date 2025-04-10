<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;

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
    Route::resource('books', BookController::class)->except(['show']);
});