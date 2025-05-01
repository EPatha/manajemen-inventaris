<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Menampilkan semua kategori
        return response()->json(Category::all(), 200);
    }

    public function store(Request $request)
    {
        // Validasi data kategori
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Menyimpan kategori baru
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => 1, // Menetapkan ID admin yang sedang login
        ]);

        // Mengembalikan response data kategori yang baru dibuat
        return response()->json($category, 201);
    }

    public function show($id)
    {
        // Menampilkan kategori berdasarkan ID
        return response()->json(Category::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        // Validasi data kategori
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Mencari kategori berdasarkan ID dan memperbarui data
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        // Menghapus kategori berdasarkan ID
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
