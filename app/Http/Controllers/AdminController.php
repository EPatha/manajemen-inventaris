<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan daftar admin
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    // Menampilkan form untuk menambah admin
    public function create()
    {
        return view('admins.create');
    }

    // Menyimpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit admin
    public function edit(Admin $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    // Memperbarui admin
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
        ]);

        $admin->update([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin berhasil diperbarui.');
    }

    // Menghapus admin
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin berhasil dihapus.');
    }
}
