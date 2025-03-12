<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/categories', [DanhMucController::class, 'index'])->name('admin.categories');
Route::get('/admin/books', [BookController::class, 'index'])->name('admin.books');
Route::get('/admin/author', [AuthorController::class, 'index'])->name('admin.author');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('danhmucs', DanhMucController::class);
});