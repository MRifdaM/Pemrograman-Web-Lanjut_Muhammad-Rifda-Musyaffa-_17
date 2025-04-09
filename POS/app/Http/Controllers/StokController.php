<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index(){
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // DB::insert('insert into t_stok(barang_id, user_id, supplier_id, stok_tanggal, stok_jumlah, created_at) values(?, ?, ?, ?, ?, ?)', [11, 1, 1, now(), 100, now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update t_stok set stok_jumlah = ? where stok_id = ?', [150, 11]);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::delete('delete from t_stok where stok_id = ?', [11]);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from t_stok');
        // return view('stok', ['data' => $data]);

         //=======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
        // $data = [
        //     'barang_id' => '11',
        //     'user_id' => '1',
        //     'supplier_id' => '1',
        //     'stok_tanggal' => now(),
        //     'stok_jumlah' => '100',
        //     'created_at' => now()
        // ];

        // DB::table('t_stok')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('t_stok')->where('stok_id', '11')->update(['stok_jumlah' => '150']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::table('t_stok')->where('stok_id', '11')->delete();
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::table('t_stok')->get();
        // return view('stok', ['data' => $data]);

       //=======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
        // $data = [
        //     'barang_id' => '11',
        //     'user_id' => '1',
        //     'supplier_id' => '1',
        //     'stok_tanggal' => now(),
        //     'stok_jumlah' => '100',
        //     'created_at' => now()
        // ];

        // StokModel::insert($data);

        // $data =[
        //     'stok_jumlah' => '150'
        // ];

        // StokModel::where('stok_id', '11')->update($data);

        // $stok = StokModel::all();

        //=======================================================================================Jobsheet 4 Praktikum 1============================================================================================
        // $data = [
        //     'barang_id' => '12',
        //     'user_id' => '1',
        //     'supplier_id' => '3',
        //     'stok_tanggal' => now(),
        //     'stok_jumlah' => '60'
        // ];
        // StokModel::create($data);

        // $data = [
        //     'barang_id' => '13',
        //     'user_id' => '1',
        //     'supplier_id' => '2',
        //     'stok_tanggal' => now(),
        //     'stok_jumlah' => '45'
        // ];
        // StokModel::create($data);

        // $stok = StokModel::all();
        // return view('stok', ['data' => $stok]);

        //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
        $stok = StokModel::with('barang', 'user', 'supplier')->get();
        return view('stok', ['data' => $stok]);
    }

    //=======================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
    public function tambah()
    {
        $barangs = BarangModel::all();
        $users  = UserModel::all();
        $suppliers = SupplierModel::all();

        return view('stok_tambah', ['barangs' => $barangs, 'users' => $users, 'suppliers' => $suppliers]);
    }

    public function tambah_simpan(Request $request)
    {
        StokModel::create([
            'barang_id'    => $request->barang_id,
            'user_id'      => $request->user_id,
            'supplier_id'  => $request->supplier_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah'  => $request->stok_jumlah,
        ]);

        return redirect('/stok');
    }

    public function ubah($id)
    {
        $stok = StokModel::find($id);
        $barangs = BarangModel::all();
        $users  = UserModel::all();
        $suppliers = SupplierModel::all();
        return view('stok_ubah', ['data' => $stok, 'barangs' => $barangs, 'users' => $users, 'suppliers' => $suppliers]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $stok = StokModel::find($id);

        $stok->barang_id    = $request->barang_id;
        $stok->user_id      = $request->user_id;
        $stok->stok_tanggal = $request->stok_tanggal;
        $stok->stok_jumlah  = $request->stok_jumlah;

        $stok->save();

        return redirect('/stok');
    }

    public function hapus($id)
    {
        $stok = StokModel::find($id);
        $stok->delete();

        return redirect('/stok');
    }

}
