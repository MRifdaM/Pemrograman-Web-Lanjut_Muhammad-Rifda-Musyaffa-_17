<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanDetailController extends Controller
{
    public function index(){
        // DB::insert('insert into t_penjualan_detail(penjualan_id, barang_id, jumlah, harga, created_at) values(?, ?, ?, ?, ?)', [11, 11, 2, 120000, now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update t_penjualan_detail set jumlah = ? where detail_id = ?', [3, 31]);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::delete('delete from t_penjualan_detail where detail_id = ?', [31]);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from t_penjualan_detail');
        // return view('penjualan_detail', ['data' => $data]);

        //  =======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
        // $data = [
        //     'penjualan_id' => '11',
        //     'barang_id' => '11',
        //     'jumlah' => '2',
        //     'harga' => '120000',
        //     'created_at' => now()
        // ];

        // DB::table('t_penjualan_detail')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('t_penjualan_detail')->where('detail_id', '31')->update(['jumlah' => '3']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::table('t_penjualan_detail')->where('detail_id', '31')->delete();
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::table('t_penjualan_detail')->get();
        // return view('penjualan_detail', ['data' => $data]);

        // =======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
        // $data = [
        //     'penjualan_id' => '11',
        //     'barang_id' => '11',
        //     'jumlah' => '2',
        //     'harga' => '120000',
        //     'created_at' => now()
        // ];

        // PenjualanDetailModel::insert($data);

        // $data =[
        //     'jumlah' => '3'
        // ];

        // PenjualanDetailModel::where('detail_id', '31')->update($data);

        // $penjualanDetail = PenjualanDetailModel::all();
        // return view('penjualanDetail', ['data' => $penjualanDetail]);

        // =======================================================================================Jobsheet 4 Praktikum 1============================================================================================
        // $data = [
        //     'penjualan_id' => '12',
        //     'barang_id' => '12',
        //     'jumlah' => '1',
        //     'harga' => '400000',
        // ];
        // PenjualanDetailModel::create($data);

        // $data = [
        //     'penjualan_id' => '13',
        //     'barang_id' => '12',
        //     'jumlah' => '1',
        //     'harga' => '400000',
        // ];
        // PenjualanDetailModel::create($data);

        // $penjualanDetail = PenjualanDetailModel::all();
        // return view('penjualan_detail', ['data' => $penjualanDetail]);
        //=======================================================================================Jobsheet 4 Praktikum 2.6===========================================================================================
        $penjualanDetail = PenjualanDetailModel::with('barang', 'penjualan')->get();
        return view('penjualanDetail', ['data' => $penjualanDetail]);

    }

    //========================================================================================Jobsheet 4 Praktikum 2.6===========================================================================================

    public function tambah()
    {
        $penjualans = PenjualanModel::all();
        $barangs = BarangModel::all();
        return view('penjualanDetail_tambah', ['penjualans' => $penjualans, 'barangs' => $barangs]);
    }

    public function tambah_simpan(Request $request)
    {
        PenjualanDetailModel::create([
            'penjualan_id' => $request->penjualan_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect('/penjualan-detail');
    }

    public function ubah($id)
    {
        $detail = PenjualanDetailModel::find($id);
        $penjualans = PenjualanModel::all();
        $barangs = BarangModel::all();
        return view('penjualanDetail_ubah', ['data' => $detail, 'penjualans' => $penjualans, 'barangs' => $barangs]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $detail = PenjualanDetailModel::find($id);

        $detail->penjualan_id = $request->penjualan_id;
        $detail->barang_id = $request->barang_id;
        $detail->jumlah = $request->jumlah;
        $detail->harga = $request->harga;

        $detail->save();

        return redirect('/penjualan-detail');
    }

    public function hapus($id)
    {
        $detail = PenjualanDetailModel::find($id);
        $detail->delete();

        return redirect('/penjualan-detail');
    }
}
