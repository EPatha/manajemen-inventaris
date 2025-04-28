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
    ];

    // Menentukan bahwa model ini menggunakan timestamps
    public $timestamps = true;  // Laravel secara otomatis mengelola created_at dan updated_at

    // Menambahkan mutator untuk created_by agar otomatis terisi
    protected static function booted()
    {
        static::creating(function ($item) {
            $item->created_by = auth()->id(); // Menetapkan created_by dengan ID pengguna yang sedang login
        });
    }

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
