<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic gadgets and devices',
            'created_by' => 1, // Assume admin with ID 1
        ]);

        Category::create([
            'name' => 'Furniture',
            'description' => 'Home furniture items',
            'created_by' => 1, // Assume admin with ID 1
        ]);
    }
}
