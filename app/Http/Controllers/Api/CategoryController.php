<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all categories from the database
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form for creating a new category (if using a frontend form)
        return response()->json(['message' => 'Form for creating a category']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // Create a new category record
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Return a response with the created category
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Return the category as a JSON response
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Return the category for editing (this can be a frontend form response)
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // Update the category with the new data
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Return a response with the updated category
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Return a success message
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
