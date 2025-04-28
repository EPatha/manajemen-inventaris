<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Menampilkan daftar supplier
    public function index()
    {
        $suppliers = Supplier::all();  // Ambil semua data supplier
        return view('suppliers.index', compact('suppliers'));  // Kirim data ke view
    }

    // Menampilkan form untuk menambah supplier
    public function create()
    {
        return view('suppliers.create');
    }

    // Menyimpan supplier baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'contact_info' => 'required|string|max:100',
        ]);
    
        // Menyimpan data supplier
        Supplier::create([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'created_by' => 1, // Menetapkan ID admin pertama (ID=1) jika tidak ada login
        ]);
    
        // Redirect ke daftar supplier setelah berhasil
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit supplier
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    // Memperbarui supplier
    public function update(Request $request, Supplier $supplier)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'contact_info' => 'required|string|max:100',
        ]);

        // Memperbarui data supplier
        $supplier->update([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
        ]);

        // Redirect ke daftar supplier setelah berhasil
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    // Menghapus supplier
    public function destroy(Supplier $supplier)
    {
        // Menghapus supplier
        $supplier->delete();

        // Redirect ke daftar supplier setelah berhasil dihapus
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
