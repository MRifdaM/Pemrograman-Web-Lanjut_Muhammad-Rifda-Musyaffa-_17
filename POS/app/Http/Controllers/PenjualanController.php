<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(){
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // DB::insert('insert into t_penjualan(user_id, pembeli, penjualan_kode, tanggal_penjualan, created_at) values(?, ?, ?, ?, ?)', [3, 'Seli Bunga', 'PNJ11', now(), now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update t_penjualan set pembeli = ? where penjualan_kode = ?', ['Selina Bunga', 'PNJ11']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::delete('delete from t_penjualan where penjualan_kode = ?', ['PNJ11']);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from t_penjualan');
        // return view('penjualan', ['data' => $data]);

         //=======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
        // $data = [
        //     'user_id' => '3',
        //     'pembeli' => 'Seli Bunga',
        //     'penjualan_kode' => 'PNJ11',
        //     'tanggal_penjualan' => now(),
        //     'created_at' => now()
        // ];

        // DB::table('t_penjualan')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('t_penjualan')->where('penjualan_kode', 'PNJ11')->update(['pembeli' => 'Selina Bunga']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::table('t_penjualan')->where('penjualan_kode', 'PNJ11')->delete();
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::table('t_penjualan')->get();
        // return view('penjualan', ['data' => $data]);

        //=======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
        // $data = [
        //     'user_id' => '3',
        //     'pembeli' => 'Seli Bunga',
        //     'penjualan_kode' => 'PNJ11',
        //     'tanggal_penjualan' => now(),
        //     'created_at' => now()
        // ];

        // PenjualanModel::insert($data);

        // $data =[
        //     'pembeli' => 'Selina Bunga',
        // ];

        // PenjualanModel::where('penjualan_kode', 'PNJ11')->update($data);

        // $penjualan = PenjualanModel::all();
        // return view('penjualan', ['data' => $penjualan]);

        //=======================================================================================Jobsheet 4 Praktikum 1============================================================================================
        $data = [
            'user_id' => '2',
            'pembeli' => 'Bambang Stria',
            'penjualan_kode' => 'PNJ12',
            'tanggal_penjualan' => now(),
        ];
        PenjualanModel::create($data);

        // $data = [
        //     'user_id' => '2',
        //     'pembeli' => 'Silvia Eka',
        //     'penjualan_kode' => 'PNJ13',
        //     'tanggal_penjualan' => now(),
        // ];
        // PenjualanModel::create($data);

        $penjualan = PenjualanModel::all();
        return view('penjualan', ['data' => $penjualan]);
    }
}
