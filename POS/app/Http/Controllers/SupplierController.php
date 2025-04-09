<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index(){

        // DB::insert('insert into m_supplier(supplier_kode, supplier_nama, supplier_alamat, created_at) values(?, ?, ?, ?)', ['SPL104', 'PT Rahmat Jaya', 'JL Agus Dibroho', now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update m_supplier set supplier_nama = ? where supplier_kode = ?', ['PT Rahmat Kejayaan', 'SPL104']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::delete('delete from m_supplier where supplier_kode = ?', ['SPL104']);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from m_supplier');
        // return view('supplier', ['data' => $data]);

         //=======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
        // $data = [
        //     'supplier_kode' => 'SPL104',
        //     'supplier_nama' => 'PT Rahmat Jaya',
        //     'supplier_alamat' => 'JL Agus Dibroho',
        //     'created_at' => now()
        // ];

        // DB::table('m_supplier')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_supplier')->where('supplier_kode', 'SPL104')->update(['supplier_nama' => 'PT Rahmat Kejayaan']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::table('m_supplier')->where('supplier_kode', 'SPL104')->delete();
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::table('m_supplier')->get();
        // return view('supplier', ['data' => $data]);

        //=======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
        // $data = [
        //     'supplier_kode' => 'SPL104',
        //     'supplier_nama' => 'PT Rahmat Jaya',
        //     'supplier_alamat' => 'JL Agus Dibroho',
        //     'created_at' => now()
        // ];

        // SupplierModel::insert($data);

        // $data =[
        //     'supplier_nama' => 'PT Rahmat Kejayaan',
        // ];

        // SupplierModel::where('supplier_kode', 'SPL104')->update($data);

        // $supplier = SupplierModel::all();
        // return view('supplier', ['data' => $supplier]);

        //=======================================================================================Jobsheet 4 Praktikum 1============================================================================================
        // $data = [
        //     'supplier_kode' => 'SPL105',
        //     'supplier_nama' => 'PT Sumber Makmur Abadi',
        //     'supplier_alamat' => 'JL Merpati No. 5',
        // ];
        // SupplierModel::create($data);

        // $data = [
        //     'supplier_kode' => 'SPL106',
        //     'supplier_nama' => 'PT Raya Asri Abadi',
        //     'supplier_alamat' => 'JL Bunga Mawar No. 10',
        // ];
        // SupplierModel::create($data);

        // $supplier = SupplierModel::all();
        // return view('supplier', ['data' => $supplier]);

        //=======================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
        $supplier = SupplierModel::all();
        return view('supplier', ['data' => $supplier]);
    }

    //==========================================================================================Jobsheet 4 Praktikum 2.6===========================================================================================
    public function tambah()
    {
        return view('supplier_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        SupplierModel::create([
            'supplier_kode' => $request->supplier_kode,
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
        ]);

        return redirect('/supplier');
    }

    public function ubah($id)
    {
        $supplier = SupplierModel::find($id);
        return view('supplier_ubah', ['data' => $supplier]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $supplier = SupplierModel::find($id);

        $supplier->supplier_kode   = $request->supplier_kode;
        $supplier->supplier_nama   = $request->supplier_nama;
        $supplier->supplier_alamat = $request->supplier_alamat;

        $supplier->save();

        return redirect('/supplier');
    }

    public function hapus($id)
    {
        $supplier = SupplierModel::find($id);
        $supplier->delete();

        return redirect('/supplier');
    }
    //============================================================================================================================================================================================
}
