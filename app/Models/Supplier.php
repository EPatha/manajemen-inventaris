<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Menentukan kolom yang bisa diisi menggunakan mass-assignment
    protected $fillable = [
        'name',
        'contact_info',
        'created_by',  // Menambahkan created_by ke fillable
    ];
}
