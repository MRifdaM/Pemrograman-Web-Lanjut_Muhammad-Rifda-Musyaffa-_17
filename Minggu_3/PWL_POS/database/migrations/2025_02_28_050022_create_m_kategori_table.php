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
        Schema::create('m_kategori', function (Blueprint $table) {
            $table->id('kategori_id');
            $table->string('kode_kategori', 10)->unique();              // Kode kategori unik
            $table->string('nama_kategori', 100);               // Nama kategori
            $table->text('deskripsi')->nullable();               // Deskripsi kategori (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_kategori');
    }
};
