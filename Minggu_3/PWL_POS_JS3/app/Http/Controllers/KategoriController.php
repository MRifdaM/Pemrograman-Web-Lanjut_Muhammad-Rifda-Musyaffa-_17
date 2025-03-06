<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(){
        //Menambahkan atau Memasukkan data baru menggunakan Query Builder
        // $data = [
        //     'kode_kategori' => 'SNK',
        //     'nama_kategori' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];

        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        //Merubah data yang sudah ada menggunakan Query Builder
        // $row = DB::table('m_kategori')->where('kode_kategori', 'SNK')->update(['nama_kategori' => 'Camilan']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        //Menghapus data yang sudah ada menggunakan Query Builder
        // $row = DB::table('m_kategori')->where('kode_kategori', 'SNK')->delete();
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        //Mengambil data menggunakan Query Builder
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}
