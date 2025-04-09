<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(){
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // DB::insert('insert into t_penjualan(user_id, pembeli, penjualan_kode, penjualan_tanggal, created_at) values(?, ?, ?, ?, ?)', [3, 'Seli Bunga', 'PNJ11', now(), now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update t_penjualan set pembeli = ? where penjualan_kode = ?', ['Selina Bunga', 'PNJ11']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::delete('delete from t_penjualan where penjualan_kode = ?', ['PNJ11']);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from t_penjualan');
        // return view('penjualan', ['data' => $data]);

        //  =======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
        // $data = [
        //     'user_id' => '3',
        //     'pembeli' => 'Seli Bunga',
        //     'penjualan_kode' => 'PNJ11',
        //     'penjualan_tanggal' => now(),
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

        // =======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
        // $data = [
        //     'user_id' => '3',
        //     'pembeli' => 'Seli Bunga',
        //     'penjualan_kode' => 'PNJ11',
        //     'penjualan_tanggal' => now(),
        //     'created_at' => now()
        // ];

        // PenjualanModel::insert($data);

        // $data =[
        //     'pembeli' => 'Selina Bunga',
        // ];

        // PenjualanModel::where('penjualan_kode', 'PNJ11')->update($data);

        // $penjualan = PenjualanModel::all();
        // return view('penjualan', ['data' => $penjualan]);

        // =======================================================================================Jobsheet 4 Praktikum 1============================================================================================
        // $data = [
        //     'user_id' => '2',
        //     'pembeli' => 'Bambang Stria',
        //     'penjualan_kode' => 'PNJ12',
        //     'penjualan_tanggal' => now(),
        // ];
        // PenjualanModel::create($data);

        // $data = [
        //     'user_id' => '2',
        //     'pembeli' => 'Silvia Eka',
        //     'penjualan_kode' => 'PNJ13',
        //     'penjualan_tanggal' => now(),
        // ];
        // PenjualanModel::create($data);

        // $penjualan = PenjualanModel::all();
        // return view('penjualan', ['data' => $penjualan]);

        //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
        $penjualan = PenjualanModel::with('user')->get();
        return view('penjualan', ['data' => $penjualan]);
    }

    //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
    public function tambah()
    {
        $users = UserModel::all();
        return view('penjualan_tambah', ['users' => $users]);
    }

    public function tambah_simpan(Request $request)
    {
        PenjualanModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
        ]);

        return redirect('/penjualan');
    }

    public function ubah($id)
    {
        $penjualan = PenjualanModel::find($id);
        $users = UserModel::all();
        return view('penjualan_ubah', ['data' => $penjualan, 'users' => $users]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $penjualan = PenjualanModel::find($id);

        $penjualan->user_id = $request->user_id;
        $penjualan->pembeli = $request->pembeli;
        $penjualan->penjualan_kode = $request->penjualan_kode;
        $penjualan->penjualan_tanggal = $request->penjualan_tanggal;

        $penjualan->save();

        return redirect('/penjualan');
    }

    public function hapus($id)
    {
        $penjualan = PenjualanModel::find($id);
        $penjualan->delete();

        return redirect('/penjualan');
    }
}
