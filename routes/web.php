<?php

use App\Models\Admin;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (home)
Route::get('/', function () {
    return view('home');
});

// Route untuk resource items (CRUD)
Route::resource('items', ItemController::class);

// Route untuk resource categories (CRUD)
Route::resource('categories', CategoryController::class);

// Route untuk resource suppliers (CRUD)
Route::resource('suppliers', SupplierController::class);

// Route untuk ringkasan stok barang
Route::get('items/summary', [ItemController::class, 'stockSummary'])->name('items.summary');

// Route untuk barang dengan stok rendah
Route::get('items/low-stock', [ItemController::class, 'lowStock'])->name('items.lowStock');

// Route untuk laporan berdasarkan kategori
Route::get('items/report-by-category', [ItemController::class, 'reportByCategory'])->name('items.reportByCategory');

// Route untuk ringkasan per kategori
Route::get('items/summary-by-category', [ItemController::class, 'summaryByCategory'])->name('items.summaryByCategory');

// Route untuk ringkasan per pemasok
Route::get('items/summary-by-supplier', [ItemController::class, 'summaryBySupplier'])->name('items.summaryBySupplier');

// Route untuk ringkasan keseluruhan
Route::get('items/summary', [ItemController::class, 'summary'])->name('items.summary');

// Route untuk menampilkan detail item
Route::get('items/{item}', [ItemController::class, 'show'])->name('items.show');

// Route untuk menampilkan semua admins
Route::get('/admins', function() {
    $admins = Admin::all();
    return view('admins', compact('admins'));
});
