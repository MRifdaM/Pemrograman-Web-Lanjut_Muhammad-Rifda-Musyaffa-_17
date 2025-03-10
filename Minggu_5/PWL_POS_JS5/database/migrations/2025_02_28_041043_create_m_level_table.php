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
        #commit ulang dikarenakan belum melakukan commit untuk Praktikum 2.1
        Schema::create('m_level', function (Blueprint $table) {
            $table->id('level_id');
            $table->string('level_kode', 10)->unique();//menambahkan kolom level_kode dengan tipe data varchar dengan panjang 10 karakter serta manambahkan constraint unique pada kolom kevek_kode
            $table->string('level_nama', 100);//menambahkan kolom level_nama dengan tipe data varchar dengan panjang 100 karakter
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_level');
    }
};
