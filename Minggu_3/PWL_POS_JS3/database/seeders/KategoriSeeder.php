<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kategori')->insert([
            [
                'kode_kategori' => 'KTG01',
                'nama_kategori' => 'Elektronik',
                'deskripsi'   => 'Kategori barang elektronik',
            ],
            [
                'kode_kategori' => 'KTG02',
                'nama_kategori' => 'Pakaian',
                'deskripsi'   => 'Kategori pakaian dan aksesoris',
            ],
            [
                'kode_kategori' => 'KTG03',
                'nama_kategori' => 'Makanan',
                'deskripsi'   => 'Kategori makanan dan minuman',
            ],
            [
                'kode_kategori' => 'KTG04',
                'nama_kategori' => 'Buku',
                'deskripsi'   => 'Kategori buku dan majalah',
            ],
            [
                'kode_kategori' => 'KTG05',
                'nama_kategori' => 'Olahraga',
                'deskripsi'   => 'Kategori perlengkapan olahraga',
            ],
        ]);
    }
}
