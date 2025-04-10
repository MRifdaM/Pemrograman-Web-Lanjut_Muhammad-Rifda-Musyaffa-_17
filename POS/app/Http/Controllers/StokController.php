<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
        // $stok = StokModel::with('barang', 'user', 'supplier')->get();
        // return view('stok', ['data' => $stok]);

        //===========================================================================================Jobsheet 5=====================================================================================================
        $breadcrumb = (object) [
            'title' => 'Daftar Stock Barang',
            'list' => ['Home', 'Stock Barang']
        ];

        $page = (object) [
            'title' => 'Daftar stock barang yang terdaftar dalam sistem'
        ];

        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        $user = UserModel::select('user_id', 'nama')->get();
        $supplier = SupplierModel::select('supplier_id', 'supplier_nama')->get();

        $activeMenu = 'stok'; // set menu yang sedang aktif

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'barang' => $barang, 'user'=> $user, 'supplier' => $supplier, 'page' => $page,'activeMenu' => $activeMenu]);
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
    //=======================================================================================================================================================================================================

    //========================================================================================Jobsheet 5=====================================================================================================

    public function list(Request $request){
        $stoks = StokModel::select('stok_id', 'barang_id', 'user_id', 'supplier_id', 'stok_tanggal', 'stok_jumlah')
        ->with(['barang', 'user', 'supplier']);

        $barang_id = $request->input('barang_id');
        if (!empty($barang_id)) {
            $stoks->where('barang_id', $barang_id);
        }

        $user_id = $request->input('user_id');
        if (!empty($user_id)) {
            $stoks->where('user_id', $user_id);
        }

        $supplier_id = $request->input('supplier_id');
        if (!empty($supplier_id)) {
            $stoks->where('supplier_id', $supplier_id);
        }

        return DataTables::of($stoks)

        ->addIndexColumn() // menambahkan kolom index / no urut (default user_id kolom:DT_RowIndex)
        ->addColumn('aksi', function ($stoks) { // menambahkan kolom aksi
            $btn = '<a href="'.url('/stok/' . $stoks->stok_id).'" class="btn btn-info btnsm">Detail</a> ';
            $btn .= '<a href="'.url('/stok/' . $stoks->stok_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/stok/'.$stoks->stok_id).'">'
            . csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';

            return $btn;
        })->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Stok Barang',
            'list' => ['Home', 'Stock Barang', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah stock baru'
        ];

        $activeMenu = 'stok';
        $barang = BarangModel::all();
        $user = UserModel::all();
        $supplier = SupplierModel::all();

        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'supplier' => $supplier, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|min:1',
        ]);

        StokModel::create([
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'supplier_id' => $request->supplier_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil disimpan');
    }

    // Menampilkan detail stok
    public function show(string $id)
    {
        $stok = StokModel::with('barang', 'user', 'supplier')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Stok Barang',
            'list' => ['Home', 'stok barang', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail stok barang'
        ];

        $activeMenu = 'stok';

        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }

    // Menampilkan halaman form edit stok
    public function edit(string $id)
    {
        $stok = stokModel::find($id);
        $barang = BarangModel::all();
        $user = UserModel::all();
        $supplier = SupplierModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Stok Barang',
            'list' => ['Home', 'stok barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit stok barang'
        ];


        $activeMenu = 'stok';

        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'barang' => $barang, 'user' => $user, 'supplier' => $supplier, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data stok
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|min:1',
        ]);


        stokModel::find($id)->update([
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'supplier_id' => $request->supplier_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil diperbarui');
    }


    // Menghapus data stok
    public function destroy(string $id)
    {
        $check = stokModel::find($id);
        if (!$check) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            stokModel::destroy($id);
            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

}
