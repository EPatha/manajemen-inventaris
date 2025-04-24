<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        Item::create([
            'name' => 'Smartphone',
            'description' => 'Latest model smartphone with 128GB storage',
            'price' => 1000.00,
            'quantity' => 50,
            'category_id' => 1, // Assuming 'Electronics' category with ID 1
            'supplier_id' => 1, // Assuming 'Supplier A' with ID 1
            'created_by' => 1, // Assume admin with ID 1
        ]);

        Item::create([
            'name' => 'Sofa Set',
            'description' => '3-piece comfortable sofa set for living room',
            'price' => 500.00,
            'quantity' => 20,
            'category_id' => 2, // Assuming 'Furniture' category with ID 2
            'supplier_id' => 2, // Assuming 'Supplier B' with ID 2
            'created_by' => 1, // Assume admin with ID 1
        ]);
    }
}
