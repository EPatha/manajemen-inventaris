<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all suppliers from the database
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Placeholder: normally, this would return a view for creating a supplier.
        return response()->json(['message' => 'Form for creating a supplier']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'nullable|string',
        ]);

        // Create a new supplier record
        $supplier = Supplier::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);

        // Return a response with the created supplier
        return response()->json($supplier, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the supplier by its ID
        $supplier = Supplier::findOrFail($id);

        // Return the supplier as a JSON response
        return response()->json($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the supplier by its ID
        $supplier = Supplier::findOrFail($id);

        // Return the supplier data for editing (can be used in a frontend form)
        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the supplier by its ID
        $supplier = Supplier::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'nullable|string',
        ]);

        // Update the supplier record
        $supplier->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);

        // Return a response with the updated supplier
        return response()->json($supplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the supplier by its ID
        $supplier = Supplier::findOrFail($id);

        // Delete the supplier record
        $supplier->delete();

        // Return a success message
        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}
