<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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
        // $penjualan = PenjualanModel::with('user')->get();
        // return view('penjualan', ['data' => $penjualan]);

        //========================================================================================Jobsheet 5================================================================================================
        $breadcrumb = (object) [
            'title' => 'Daftar Penjualan',
            'list'  => ['Home', 'Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar penjualan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penjualan';


        $users = UserModel::all();

        return view('penjualan.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'users'      => $users,
            'activeMenu' => $activeMenu
        ]);
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
    //==================================================================================================================================================================================================

    //========================================================================================Jobsheet 5================================================================================================
    public function list(Request $request)
    {
        // Select kolom yang akan ditampilkan di list
        $penjualans = PenjualanModel::select(
            'penjualan_id',
            'user_id',
            'pembeli',
            'penjualan_kode',
            'penjualan_tanggal'
        )
        ->with('user'); // Relasi ke model user

        // Filter data berdasarkan user_id
        $user_id = $request->input('user_id');
        if (!empty($user_id)) {
            $penjualans->where('user_id', $user_id);
        }

        return DataTables::of($penjualans)
            ->addIndexColumn() // kolom DT_RowIndex
            ->addColumn('aksi', function ($penjualans) {
                // Tombol Detail, Edit, dan Hapus
                $btn = '<a href="'.url('/penjualan-detail/' . $penjualans->penjualan_id).'"
                            class="btn btn-info btn-sm">Detail</a> ';

                $btn .= '<a href="'.url('/penjualan/' . $penjualans->penjualan_id . '/edit').'"
                            class="btn btn-warning btn-sm">Edit</a> ';

                $btn .= '<form class="d-inline-block" method="POST"
                            action="'.url('/penjualan/'.$penjualans->penjualan_id).'">'
                        . csrf_field()
                        . method_field('DELETE')
                        . '<button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">
                            Hapus
                          </button></form>';

                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Menampilkan halaman form tambah penjualan
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Penjualan',
            'list'  => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah penjualan baru'
        ];

        $activeMenu = 'penjualan';

        // Ambil data user untuk keperluan pemilihan kasir / user
        $users = UserModel::all();

        return view('penjualan.create', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'activeMenu' => $activeMenu,
            'users'      => $users
        ]);
    }

    // Menyimpan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id'          => 'required|integer',
            'pembeli'          => 'required|string|max:100',
            'penjualan_kode'   => 'required|string|max:20|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal'=> 'required|date',
        ]);

        PenjualanModel::create([
            'user_id'          => $request->user_id,
            'pembeli'          => $request->pembeli,
            'penjualan_kode'   => $request->penjualan_kode,
            'penjualan_tanggal'=> $request->penjualan_tanggal,
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
    }

    // Menampilkan detail penjualan
    public function show(string $id)
    {
        // Gunakan with('user') agar info user (kasir) dapat ditampilkan
        $penjualan = PenjualanModel::with('user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list'  => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail penjualan'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'penjualan'  => $penjualan,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menampilkan halaman form edit penjualan
    public function edit(string $id)
    {
        $penjualan = PenjualanModel::find($id);
        if (!$penjualan) {
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Edit Penjualan',
            'list'  => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit penjualan'
        ];

        $activeMenu = 'penjualan';

        // Ambil data user untuk mengisi dropdown user
        $users = UserModel::all();

        return view('penjualan.edit', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'penjualan'  => $penjualan,
            'users'      => $users,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data penjualan
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id'          => 'required|integer',
            'pembeli'          => 'required|string|max:100',
            'penjualan_kode'   => 'required|string|max:20|unique:t_penjualan,penjualan_kode,'.$id.',penjualan_id',
            'penjualan_tanggal'=> 'required|date',
        ]);

        $penjualan = PenjualanModel::find($id);
        if (!$penjualan) {
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        $penjualan->update([
            'user_id'          => $request->user_id,
            'pembeli'          => $request->pembeli,
            'penjualan_kode'   => $request->penjualan_kode,
            'penjualan_tanggal'=> $request->penjualan_tanggal,
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah');
    }

    // Menghapus data penjualan
    public function destroy(string $id)
    {
        $check = PenjualanModel::find($id);
        if (!$check) {
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try {
            PenjualanModel::destroy($id);
            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika ada constraint foreign key, dsb.
            return redirect('/penjualan')->with(
                'error',
                'Data penjualan gagal dihapus karena masih ada data lain yang terkait'
            );
        }
    }
    //==================================================================================================================================================================================================

    //========================================================================================Jobsheet 6================================================================================================
    public function create_ajax()
    {
        $users = UserModel::all();
        return view('penjualan.create_ajax')->with('users', $users);
    }

    // Simpan data penjualan baru
    public function store_ajax(Request $request)
    {
        $rules = [
            'user_id'           => ['required', 'integer'],
            'pembeli'           => ['required', 'string', 'max:100'],
            'penjualan_kode'    => ['required', 'string', 'max:20', 'unique:t_penjualan,penjualan_kode'],
            'penjualan_tanggal' => ['required', 'date'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false, // response status, false: error/gagal, true: berhasil
                'message' => 'Validasi Gagal',
                'msgField' => $validator->errors() // pesan error validasi
            ]);
        }

        PenjualanModel::create($request->all());

        return response()->json([
            'status'  => true,
            'message' => 'Data penjualan berhasil disimpan'
        ]);

    }
}
