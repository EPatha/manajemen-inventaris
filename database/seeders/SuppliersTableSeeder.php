<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        Supplier::create([
            'name' => 'Supplier A',
            'contact_info' => 'supplierA@example.com',
            'created_by' => 1, // Assume admin with ID 1
        ]);

        Supplier::create([
            'name' => 'Supplier B',
            'contact_info' => 'supplierB@example.com',
            'created_by' => 1, // Assume admin with ID 1
        ]);
    }
}
