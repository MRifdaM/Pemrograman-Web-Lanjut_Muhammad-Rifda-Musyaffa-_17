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
        Schema::table('t_penjualan_detail', function (Blueprint $table) {
            $table->dropForeign(['penjualan_id']);

            $table->foreign('penjualan_id')
                  ->references('penjualan_id')
                  ->on('t_penjualan')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_penjualan_detail', function (Blueprint $table) {
            $table->dropForeign(['penjualan_id']);

            $table->foreign('penjualan_id')
                  ->references('penjualan_id')
                  ->on('t_penjualan');
        });
    }
};
