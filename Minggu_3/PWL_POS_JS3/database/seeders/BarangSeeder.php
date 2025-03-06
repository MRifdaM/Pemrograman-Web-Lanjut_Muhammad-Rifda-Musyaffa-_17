<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_barang')->insert([
            [
                'kategori_id'   => 1,
                'barang_kode'   => 'BRG01',
                'barang_nama'   => 'Smartphone',
                'harga_jual'    => 5000000,
                'harga_beli'    => 4500000,
            ],
            [
                'kategori_id'   => 1,
                'barang_kode'   => 'BRG02',
                'barang_nama'   => 'Laptop',
                'harga_jual'    => 12000000,
                'harga_beli'    => 11000000,
            ],
            [
                'kategori_id'   => 2,
                'barang_kode'   => 'BRG03',
                'barang_nama'   => 'Kaos',
                'harga_jual'    => 100000,
                'harga_beli'    => 70000,
            ],
            [
                'kategori_id'   => 2,
                'barang_kode'   => 'BRG04',
                'barang_nama'   => 'Jaket',
                'harga_jual'    => 300000,
                'harga_beli'    => 250000,
            ],
            [
                'kategori_id'   => 3,
                'barang_kode'   => 'BRG05',
                'barang_nama'   => 'Snack',
                'harga_jual'    => 20000,
                'harga_beli'    => 15000,
            ],
            [
                'kategori_id'   => 3,
                'barang_kode'   => 'BRG06',
                'barang_nama'   => 'Minuman',
                'harga_jual'    => 15000,
                'harga_beli'    => 10000,
            ],
            [
                'kategori_id'   => 4,
                'barang_kode'   => 'BRG07',
                'barang_nama'   => 'Novel',
                'harga_jual'    => 80000,
                'harga_beli'    => 60000,
            ],
            [
                'kategori_id'   => 4,
                'barang_kode'   => 'BRG08',
                'barang_nama'   => 'Buku Pelajaran',
                'harga_jual'    => 50000,
                'harga_beli'    => 40000,
            ],
            [
                'kategori_id'   => 5,
                'barang_kode'   => 'BRG09',
                'barang_nama'   => 'Sepatu Olahraga',
                'harga_jual'    => 350000,
                'harga_beli'    => 300000,
            ],
            [
                'kategori_id'   => 5,
                'barang_kode'   => 'BRG10',
                'barang_nama'   => 'Bola Sepak',
                'harga_jual'    => 150000,
                'harga_beli'    => 120000,
            ],
        ]);
    }
}
