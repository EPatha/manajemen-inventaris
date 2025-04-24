<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;  // Ini adalah penggunaan 'use' yang benar


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Admin::create([
            'username' => 'admin1',
            'password' => bcrypt('password123'),
            'email' => 'admin1@example.com',
        ]);
    }
    
}
