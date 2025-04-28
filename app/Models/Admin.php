<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Menentukan kolom yang bisa diisi menggunakan mass-assignment
    protected $fillable = [
        'username', 'password', 'email',
    ];

    // Jika menggunakan timestamps
    public $timestamps = true;
}
