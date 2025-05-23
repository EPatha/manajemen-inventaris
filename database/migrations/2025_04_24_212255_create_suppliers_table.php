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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('contact_info', 100)->nullable();
            $table->foreignId('created_by')->constrained('admins'); // Foreign Key ke tabel admins
            $table->timestamps(); // created_at, updated_at
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
    
};
