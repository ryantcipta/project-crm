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
        Schema::table('users', function (Blueprint $table) {
            $table->string('kode_dealer')->nullable()->after('id'); // Kolom untuk kode dealer
            $table->string('nama_dealer')->nullable()->after('kode_dealer'); // Kolom untuk nama dealer
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['kode_dealer', 'nama_dealer']);
        });
    }
};
