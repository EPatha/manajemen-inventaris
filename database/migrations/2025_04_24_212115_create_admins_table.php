<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;  // Ini adalah penggunaan 'use' yang benar


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('password', 100);
            $table->string('email', 100)->nullable();
            $table->timestamps(); // created_at, updated_at
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('admins');
    }
    
};
