<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(){
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // DB::insert('insert into m_barang(kategori_id, barang_kode, barang_nama, harga_jual, harga_beli, created_at) values(?, ?, ?, ?, ?, ?)', [1, 'ELT-003', 'Kipas Angin Cosmos', 120000, 90000, now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update m_barang set harga_jual = ? where barang_kode = ?', [110000, 'ELT-003']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::delete('delete from m_barang where barang_kode = ?', ['ELT-003']);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from m_barang');
        // return view('barang', ['data' => $data]);

        //=======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
        // $data = [
        //     'kategori_id' => 1,
        //     'barang_kode' => 'ELT-003',
        //     'barang_nama' => 'Kipas Angin Cosmos',
        //     'harga_jual' => 120000,
        //     'harga_beli' => 90000,
        //     'created_at' => now()
        // ];

        // DB::table('m_barang')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_barang')->where('barang_kode', 'ELT-003')->update(['harga_jual' => '110000']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::table('m_barang')->where('barang_kode', 'ELT-003')->delete();
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::table('m_barang')->get();
        // return view('barang', ['data' => $data]);

        //=======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
        // $data = [
        //     'kategori_id' => '1',
        //     'barang_kode' => 'ELT-003',
        //     'barang_nama' => 'Kipas Angin Cosmos',
        //     'harga_jual' => '120000',
        //     'harga_beli' => '90000',
        //     'created_at' => now()
        // ];

        // BarangModel::insert($data);

        $data =[
            'harga_jual' => '110000'
        ];

        BarangModel::where('barang_kode', 'ELT-003')->update($data);

        $barang = BarangModel::all();
        return view('barang', ['data' => $barang]);
    }
}
