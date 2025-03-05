<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Function up() disini digunakan untuk membuat table, saat menjalankan perintah migrate maka laravel akan menjalankan function up()
     */
    public function up(): void
    {
        //
        Schema::create('books', function (Blueprint $table) {
            $table->id(); //digunakan untuk membuat kolom id sebagai primary key
            $table->string('title'); //digunakan untuk membuat kolom 'title' bertipe string
            $table->string('author'); //digunakan untuk membuat kolom 'author' bertipe string
            $table->string('year_of_publication'); //digunakan untuk membuat kolom 'year of publication' bertipe string
            $table->integer('price'); //digunakan untuk membuat kolom 'price' bertipe integer
            $table->integer('stock'); //digunakan untuk membuat kolom 'stock' bertipe integer
            $table->text('description')->nullable(); //digunakan untuk membuat kolom 'description' bertipe text yang boleh kosong
            $table->timestamps(); //digunakan untuk membuat kolom 'created-at' dan 'updated_at' bertipe timestamp
        });
    }

    /**
     * Function down() disini digunakan untuk menghapus table, saat menjalankan perintah migrate maka laravel akan menjalankan function down()
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
