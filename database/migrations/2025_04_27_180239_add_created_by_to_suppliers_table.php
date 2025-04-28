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
        Schema::table('suppliers', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->after('contact_info');
            $table->foreign('created_by')->references('id')->on('admins')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
    
};
