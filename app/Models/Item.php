<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Menentukan kolom yang bisa diisi menggunakan mass-assignment
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
        'supplier_id',
        'created_by',  // Jika kamu ingin menetapkan 'created_by' secara otomatis
    ];

    // Relasi ke tabel Categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke tabel Suppliers
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
