<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;  
use App\Models\Supplier;  
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Menampilkan semua item
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    // Menampilkan form untuk menambah item
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('items.create', compact('categories', 'suppliers'));
    }

    // Menyimpan item baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);
    
        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'created_by' => 1,  
        ]);
    
        return redirect()->route('items.index');
    }

    // Menampilkan form untuk mengedit item
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('items.edit', compact('item', 'categories', 'suppliers'));
    }

    // Memperbarui item
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('items.index');
    }

    // Menghapus item
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index');
    }

    // Ringkasan stok barang
    public function stockSummary()
    {
        $totalQuantity = Item::sum('quantity');
        $totalValue = Item::sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $averagePrice = Item::avg('price');
        return view('items.summary', compact('totalQuantity', 'totalValue', 'averagePrice'));
    }

    // Barang dengan stok rendah
    public function lowStock()
    {
        $lowStockItems = Item::where('quantity', '<', 5)->get();
        return view('items.low_stock', compact('lowStockItems'));
    }

    // Laporan berdasarkan kategori
    public function reportByCategory()
    {
        $categories = Category::with('items')->get();
        return view('items.report_by_category', compact('categories'));
    }

    // Ringkasan per kategori
    public function summaryByCategory()
    {
        $categories = Category::with(['items' => function($query) {
            $query->selectRaw('sum(quantity) as total_quantity, sum(price * quantity) as total_value, avg(price) as average_price');
        }])->get();

        return view('items.summary_by_category', compact('categories'));
    }

    // Ringkasan barang disuplai oleh pemasok
    public function summaryBySupplier()
    {
        $suppliers = Supplier::with(['items' => function($query) {
            $query->selectRaw('sum(quantity) as total_quantity, sum(price * quantity) as total_value');
        }])->get();
    
        return view('items.summary_by_supplier', compact('suppliers'));
    }

    // Ringkasan keseluruhan sistem
    public function summary()
    {
        $totalItems = Item::sum('quantity');
        $totalValue = Item::sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();

        return view('items.summary', compact('totalItems', 'totalValue', 'totalCategories', 'totalSuppliers'));
    }

    // Menampilkan detail item
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }
}
