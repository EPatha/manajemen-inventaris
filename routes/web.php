<?php

use App\Models\Admin;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Route untuk halaman utama (home)
Route::get('/', function () {
    return view('home');
});

// Route untuk resource categories (CRUD)
Route::resource('categories', CategoryController::class);

Route::post('items', [ItemController::class, 'store'])->name('items.store');

// Route untuk resource items (CRUD)
Route::resource('items', ItemController::class);

// Route untuk resource suppliers (CRUD)
Route::resource('suppliers', SupplierController::class);

// Route untuk resource admins (CRUD)
Route::resource('admins', AdminController::class);

// Route untuk laporan berdasarkan kategori
Route::get('items/report-by-category', [ItemController::class, 'reportByCategory'])->name('items.reportByCategory');
Route::get('items/summary-by-category', [ItemController::class, 'summaryByCategory'])->name('items.summaryByCategory');

// Route untuk ringkasan stok barang
Route::get('items/summary', [ItemController::class, 'stockSummary'])->name('items.summary');

// Route untuk barang dengan stok rendah
Route::get('items/low-stock', [ItemController::class, 'lowStock'])->name('items.lowStock');

// Route untuk ringkasan per pemasok
Route::get('items/summary-by-supplier', [ItemController::class, 'summaryBySupplier'])->name('items.summaryBySupplier');

// Route untuk ringkasan keseluruhan
Route::get('items/summary', [ItemController::class, 'summary'])->name('items.summary');

// Route untuk menampilkan detail item
Route::get('items/{item}', [ItemController::class, 'show'])->name('items.show');

// Route untuk halaman dashboard (tanpa login)
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route untuk halaman admin yang tidak memerlukan login
Route::get('/admin', function () {
    return view('admin.dashboard');
});
