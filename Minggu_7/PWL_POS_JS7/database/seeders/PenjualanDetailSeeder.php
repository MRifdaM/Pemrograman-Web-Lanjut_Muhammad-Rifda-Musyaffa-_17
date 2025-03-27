<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_penjualan_detail')->insert([
            // Transaksi Penjualan 1
            [
                'penjualan_id'  => 1,
                'barang_id'     => 1,
                'jumlah_barang' => 2,
                'harga_barang'  => 5000000,
            ],
            [
                'penjualan_id'  => 1,
                'barang_id'     => 3,
                'jumlah_barang' => 1,
                'harga_barang'  => 100000,
            ],
            [
                'penjualan_id'  => 1,
                'barang_id'     => 5,
                'jumlah_barang' => 5,
                'harga_barang'  => 20000,
            ],

            // Transaksi Penjualan 2
            [
                'penjualan_id'  => 2,
                'barang_id'     => 2,
                'jumlah_barang' => 1,
                'harga_barang'  => 12000000,
            ],
            [
                'penjualan_id'  => 2,
                'barang_id'     => 4,
                'jumlah_barang' => 2,
                'harga_barang'  => 300000,
            ],
            [
                'penjualan_id'  => 2,
                'barang_id'     => 6,
                'jumlah_barang' => 3,
                'harga_barang'  => 15000,
            ],

            // Transaksi Penjualan 3
            [
                'penjualan_id'  => 3,
                'barang_id'     => 3,
                'jumlah_barang' => 2,
                'harga_barang'  => 100000,
            ],
            [
                'penjualan_id'  => 3,
                'barang_id'     => 7,
                'jumlah_barang' => 1,
                'harga_barang'  => 80000,
            ],
            [
                'penjualan_id'  => 3,
                'barang_id'     => 9,
                'jumlah_barang' => 4,
                'harga_barang'  => 350000,
            ],

            // Transaksi Penjualan 4
            [
                'penjualan_id'  => 4,
                'barang_id'     => 4,
                'jumlah_barang' => 2,
                'harga_barang'  => 300000,
            ],
            [
                'penjualan_id'  => 4,
                'barang_id'     => 8,
                'jumlah_barang' => 3,
                'harga_barang'  => 50000,
            ],
            [
                'penjualan_id'  => 4,
                'barang_id'     => 10,
                'jumlah_barang' => 1,
                'harga_barang'  => 150000,
            ],

            // Transaksi Penjualan 5
            [
                'penjualan_id'  => 5,
                'barang_id'     => 5,
                'jumlah_barang' => 3,
                'harga_barang'  => 20000,
            ],
            [
                'penjualan_id'  => 5,
                'barang_id'     => 1,
                'jumlah_barang' => 2,
                'harga_barang'  => 5000000,
            ],
            [
                'penjualan_id'  => 5,
                'barang_id'     => 2,
                'jumlah_barang' => 1,
                'harga_barang'  => 12000000,
            ],

            // Transaksi Penjualan 6
            [
                'penjualan_id'  => 6,
                'barang_id'     => 6,
                'jumlah_barang' => 2,
                'harga_barang'  => 15000,
            ],
            [
                'penjualan_id'  => 6,
                'barang_id'     => 3,
                'jumlah_barang' => 1,
                'harga_barang'  => 100000,
            ],
            [
                'penjualan_id'  => 6,
                'barang_id'     => 7,
                'jumlah_barang' => 4,
                'harga_barang'  => 80000,
            ],

            // Transaksi Penjualan 7
            [
                'penjualan_id'  => 7,
                'barang_id'     => 7,
                'jumlah_barang' => 3,
                'harga_barang'  => 80000,
            ],
            [
                'penjualan_id'  => 7,
                'barang_id'     => 8,
                'jumlah_barang' => 1,
                'harga_barang'  => 50000,
            ],
            [
                'penjualan_id'  => 7,
                'barang_id'     => 9,
                'jumlah_barang' => 2,
                'harga_barang'  => 350000,
            ],

            // Transaksi Penjualan 8
            [
                'penjualan_id'  => 8,
                'barang_id'     => 8,
                'jumlah_barang' => 2,
                'harga_barang'  => 50000,
            ],
            [
                'penjualan_id'  => 8,
                'barang_id'     => 4,
                'jumlah_barang' => 1,
                'harga_barang'  => 300000,
            ],
            [
                'penjualan_id'  => 8,
                'barang_id'     => 10,
                'jumlah_barang' => 3,
                'harga_barang'  => 150000,
            ],

            // Transaksi Penjualan 9
            [
                'penjualan_id'  => 9,
                'barang_id'     => 9,
                'jumlah_barang' => 1,
                'harga_barang'  => 350000,
            ],
            [
                'penjualan_id'  => 9,
                'barang_id'     => 5,
                'jumlah_barang' => 2,
                'harga_barang'  => 20000,
            ],
            [
                'penjualan_id'  => 9,
                'barang_id'     => 2,
                'jumlah_barang' => 3,
                'harga_barang'  => 12000000,
            ],

            // Transaksi Penjualan 10
            [
                'penjualan_id'  => 10,
                'barang_id'     => 10,
                'jumlah_barang' => 1,
                'harga_barang'  => 150000,
            ],
            [
                'penjualan_id'  => 10,
                'barang_id'     => 6,
                'jumlah_barang' => 2,
                'harga_barang'  => 15000,
            ],
            [
                'penjualan_id'  => 10,
                'barang_id'     => 1,
                'jumlah_barang' => 1,
                'harga_barang'  => 5000000,
            ],
        ]);
    }
}
