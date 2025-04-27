<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('categories.form');
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Simpan data kategori
        Category::create([
            'name' => $request->name,
        ]);
    
        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }
    

    
    public function edit(Category $category)
    {
        return view('categories.form', compact('category'));
    }
    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $category->update($request->only('name'));
    
        return redirect()->route('categories.index');
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
    
        return redirect()->route('categories.index');
    }
    
}
