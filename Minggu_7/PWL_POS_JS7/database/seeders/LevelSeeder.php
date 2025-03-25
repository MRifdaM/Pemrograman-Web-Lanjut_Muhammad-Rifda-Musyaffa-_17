<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['level_id' => 1, 'Level_kode' => 'ADM', 'level_nama' => 'Administator'],
            ['level_id' => 2, 'Level_kode' => 'MMG', 'level_nama' => ' Manager'],
            ['level_id' => 3, 'Level_kode' => 'STF', 'level_nama' => 'Staff/Kasir'],
        ];

        //Menggunakan facade DB untuk memasukkan data yang ada di variabel $data ke dalam tabel m_level
        DB::table('m_level')->insert($data);
    }
}
