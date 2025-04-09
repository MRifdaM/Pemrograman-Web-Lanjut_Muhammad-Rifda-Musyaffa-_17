<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(){
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // return 'Insert data baru berhasil';
        // DB::insert('insert into m_barang(kategori_id, barang_kode, barang_nama, harga_jual, harga_beli, created_at) values(?, ?, ?, ?, ?, ?)', [1, 'ELT-003', 'Kipas Angin Cosmos', 120000, 90000, now()]);

        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';
        // $row = DB::update('update m_barang set harga_jual = ? where barang_kode = ?', [110000, 'ELT-003']);

        // $row = DB::delete('delete from m_barang where barang_kode = ?', ['ELT-003']);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from m_barang');
        // return view('barang', ['data' => $data]);

    //     //=======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
    //     $data = [
    //         'kategori_id' => 1,
    //         'barang_kode' => 'ELT-003',
    //         'barang_nama' => 'Kipas Angin Cosmos',
    //         'harga_beli' => 90000,
    //         'harga_jual' => 120000,
    //         'created_at' => now()
    //     ];

    //     DB::table('m_barang')->insert($data);
    //     return 'Insert data baru berhasil';

    //     return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';
    //     $row = DB::table('m_barang')->where('barang_kode', 'ELT-003')->update(['harga_jual' => '110000']);

    //     $row = DB::table('m_barang')->where('barang_kode', 'ELT-003')->delete();
    //     return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

    //     $data = DB::table('m_barang')->get();
    //     return view('barang', ['data' => $data]);

    //    // =======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
    //     $data = [
    //         'kategori_id' => '1',
    //         'barang_kode' => 'ELT-003',
    //         'barang_nama' => 'Kipas Angin Cosmos',
    //         'harga_beli' => '90000',
    //         'harga_jual' => '120000',
    //         'created_at' => now()
    //     ];

    //     BarangModel::insert($data);

    //     $data =[
    //         'harga_jual' => '110000'
    //     ];

    //     BarangModel::where('barang_kode', 'ELT-003')->update($data);

    //     $barang = BarangModel::all();
    //     return view('barang', ['data' => $barang]);

    //     //=======================================================================================Jobsheet 4 Praktikum 1============================================================================================
    //     $data = [
    //         'kategori_id' => '2',
    //         'barang_kode' => 'PKA-003',
    //         'barang_nama' => 'Jeans Carvil',
    //         'harga_beli' => '300000',
    //         'harga_jual' => '400000',
    //     ];
    //     BarangModel::create($data);

    //     $data = [
    //         'kategori_id' => '4',
    //         'barang_kode' => 'BKU-003',
    //         'barang_nama' => 'The Psychology of Money',
    //         'harga_beli' => '80000',
    //         'harga_jual' => '90000',
    //     ];
    //     BarangModel::create($data);

    //     $barang = BarangModel::all();
    //     return view('barang', ['data' => $barang]);

        //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
        $barang = BarangModel::with('kategori')->get();
        return view('barang', ['data' => $barang]);
    }

    //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
    public function tambah()
    {
        $kategoris = KategoriModel::all();
        return view('barang_tambah', ['kategoris' => $kategoris]);
    }

    public function tambah_simpan(Request $request)
    {
        BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli'  => $request->harga_beli,
            'harga_jual'  => $request->harga_jual,
        ]);

        return redirect('/barang');
    }

    public function ubah($id)
    {
        $barang = BarangModel::find($id);
        $kategoris = KategoriModel::all();
        return view('barang_ubah', ['data' => $barang, 'kategoris' => $kategoris]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $barang = BarangModel::find($id);

        $barang->kategori_id = $request->kategori_id;
        $barang->barang_kode = $request->barang_kode;
        $barang->barang_nama = $request->barang_nama;
        $barang->harga_beli  = $request->harga_beli;
        $barang->harga_jual  = $request->harga_jual;

        $barang->save();

        return redirect('/barang');
    }

    public function hapus($id)
    {
        $barang = BarangModel::find($id);
        $barang->delete();

        return redirect('/barang');
    }
    //=============================================================================================================================================================================================================
}
