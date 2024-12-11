<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       
            Schema::table('projects', function (Blueprint $table) {
                $table->unsignedBigInteger('department_id')->nullable(); // Menambahkan kolom relasi
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
            Schema::table('projects', function (Blueprint $table) {
                $table->dropForeign(['department_id']);
                $table->dropColumn('department_id');
            });
        
    }
};