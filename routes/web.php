<?php

use Illuminate\Support\Facades\Route;
use App\Models\Admin;

// Route untuk menampilkan semua admins
Route::get('/admins', function() {
    $admins = Admin::all();  // Mengambil semua data admin
    return view('admins', compact('admins'));  // Mengirim data ke view
});
