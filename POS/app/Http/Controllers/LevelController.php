<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]); //menambahkan data baru ke tabel m_level menggunakan query parameter
        // return 'Insert data baru berhasil';

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']); // Melakukan update ke data yang memiliki level kode CUS dengan nilai baru yaitu Customer
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']); // Menghapus data yang memiliki level kode CUS
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from m_level'); // Mengambil semua data dari tabel m_level
        // return view('level', ['data' => $data]);

        //=======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
        // $data = [
        //     'level_kode' => 'CUS',
        //     'level_nama' => 'Customer',
        //     'created_at' => now()
        // ];

        // DB::table('m_level')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_level')->where('level_kode', 'CUS')->update(['level_nama' => 'Pelanggan']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::table('m_level')->where('level_kode', 'CUS')->delete();
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::table('m_level')->get();
        // return view('level', ['data' => $data]);

        //=======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
        // $data = [
        //     'level_kode' => 'CUS',
        //     'level_nama' => 'Customer',
        //     'created_at' => now()
        // ];

        // LevelModel::insert($data);

        // $data =[
        //     'level_nama' => 'Pelanggan'
        // ];

        // LevelModel::where('level_kode', 'CUS')->update($data);

        // $level = LevelModel::all();
        // return view('level', ['data' => $level]);

        //=======================================================================================Jobsheet 4 Praktikum 1============================================================================================
        // $data = [
        //     'level_kode' => 'LDR',
        //     'level_nama' => 'Leader'
        // ];
        // LevelModel::create($data);

        // $data = [
        //     'level_kode' => 'HRD',
        //     'level_nama' => 'Human Resource Development'
        // ];
        // LevelModel::create($data);

        // $level = LevelModel::all();
        // return view('level', ['data' => $level]);

        //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
        // $level = LevelModel::all();
        // return view('level', ['data' => $level]);

        //==============================================================================================Jobsheet 5================================================================================================
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];


        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page,'activeMenu' => $activeMenu]);
    }

    //=======================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
    public function tambah()
    {
        return view('level_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        return redirect('/level');
    }

    public function ubah($id)
    {
        $level = LevelModel::find($id);
        return view('level_ubah', ['data' => $level]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $level = LevelModel::find($id);

        $level->level_kode = $request->level_kode;
        $level->level_nama = $request->level_nama;

        $level->save();

        return redirect('/level');
    }

    public function hapus($id)
    {
        $level = LevelModel::find($id);
        $level->delete();

        return redirect('/level');
    }
    //==================================================================================================================================================================================================================

    //========================================================================================Jobsheet 5 Praktikum 3==============================================================================================
    public function list(){
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');


        return DataTables::of($levels)

            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($levels) { // menambahkan kolom aksi

                $btn = '<a href="'.url('/level/' . $levels->level_id).'" class="btn btn-info btnsm">Detail</a> ';
                $btn .= '<a href="'.url('/level/' . $levels->level_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/level/'.$levels->level_id).'">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah level baru'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|max:10|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100'
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil disimpan');
    }

    public function show(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail level'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $level = LevelModel::find($id);


        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit level'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'level_kode' => 'required|string|max:10|unique:m_level,level_kode,'.$id.',level_id',
            'level_nama' => 'required|string|max:100'
        ]);

        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try {
            LevelModel::destroy($id);
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
