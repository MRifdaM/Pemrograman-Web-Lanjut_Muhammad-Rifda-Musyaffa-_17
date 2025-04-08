<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index(){
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // DB::insert('insert into t_stok(barang_id, user_id, supplier_id, stok_tanggal_masuk, stok_jumlah, created_at) values(?, ?, ?, ?, ?, ?)', [11, 1, 1, now(), 100, now()]);
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
        //     'stok_tanggal_masuk' => now(),
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
        //     'stok_tanggal_masuk' => now(),
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
        $data = [
            'barang_id' => '12',
            'user_id' => '1',
            'supplier_id' => '3',
            'stok_tanggal_masuk' => now(),
            'stok_jumlah' => '60'
        ];
        StokModel::create($data);

        // $data = [
        //     'barang_id' => '13',
        //     'user_id' => '1',
        //     'supplier_id' => '2',
        //     'stok_tanggal_masuk' => now(),
        //     'stok_jumlah' => '45'
        // ];
        // StokModel::create($data);

        $stok = StokModel::all();
        return view('stok', ['data' => $stok]);
    }
}
