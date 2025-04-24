<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->foreignId('category_id')->constrained('categories'); // Foreign Key ke tabel categories
            $table->foreignId('supplier_id')->constrained('suppliers'); // Foreign Key ke tabel suppliers
            $table->foreignId('created_by')->constrained('admins'); // Foreign Key ke tabel admins
            $table->timestamps(); // created_at, updated_at
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('items');
    }
    
};
