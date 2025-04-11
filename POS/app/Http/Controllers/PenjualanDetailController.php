<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use Illuminate\Support\Facades\DB;
use App\Models\PenjualanDetailModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;

class PenjualanDetailController extends Controller
{
    public function index(string $penjualan_id){
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
        // $penjualanDetail = PenjualanDetailModel::with('barang', 'penjualan')->get();
        // return view('penjualanDetail', ['data' => $penjualanDetail]);

        //===========================================================================================Jobsheet 5==============================================================================================
        $penjualan = PenjualanModel::find($penjualan_id);

        $breadcrumb = (object) [
            'title' => 'Daftar Detail Penjualan ' . $penjualan->penjualan_kode,
            'list'  => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Daftar penjualan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penjualan';


        $barangs = BarangModel::all();

        return view('penjualanDetail.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'penjualan' => $penjualan,
            'barangs'      => $barangs,
            'activeMenu' => $activeMenu
        ]);
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
    //====================================================================================================================================================================================================================

    //================================================================================================Jobsheet 5==========================================================================================================
    public function list(Request $request, string $penjualan_id)
    {
        $penjualanDetails = PenjualanDetailModel::select(
            'detail_id',
            'penjualan_id',
            'barang_id',
            'jumlah',
            'harga'
        )
        ->with(['penjualan', 'barang'])
        ->where('penjualan_id', $penjualan_id);

        $barang_id = $request->input('barang_id');
        if (!empty($barang_id)) {
            $penjualanDetails->where('barang_id', $barang_id);
        }

        return DataTables::of($penjualanDetails)
            ->addIndexColumn() // kolom DT_RowIndex
            ->addColumn('aksi', function ($penjualanDetails) {
                // Tombol Detail, Edit, dan Hapus
                $btn = '<a href="'.url('/penjualan-detail/show/' . $penjualanDetails->detail_id).'"
                            class="btn btn-info btn-sm">Detail</a> ';

                $btn .= '<a href="'.url('/penjualan-detail/' . $penjualanDetails->detail_id . '/edit').'"
                            class="btn btn-warning btn-sm">Edit</a> ';

                $btn .= '<form class="d-inline-block" method="POST"
                            action="'.url('/penjualan-detail/'.$penjualanDetails->detail_id).'">'
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

    public function create(string $penjualan_id)
    {
        $penjualan = PenjualanModel::find($penjualan_id);

        $breadcrumb = (object) [
            'title' => 'Tambah Detail Penjualan ' . $penjualan->penjualan_kode,
            'list'  => ['Home', 'Penjualan', 'Detail', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Detail Penjualan untuk  ' . $penjualan->penjualan_kode
        ];

        $activeMenu = 'penjualan';


        $barangs = BarangModel::all();

        return view('penjualanDetail.create', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'penjualan'  => $penjualan,
            'barangs'      => $barangs,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required|',
            'barang_id'    => 'required|integer',
            'jumlah'       => 'required|integer',
            'harga'        => 'required|numeric',
        ]);

        try {
            // Proses dekripsi penjualan_id
            $penjualan_id = decrypt($request->penjualan_id);
        } catch (DecryptException $e) {
            // Jika dekripsi gagal (misalnya, karena data dimanipulasi), kita bisa menangani errornya di sini
            return redirect()->back()->with('error', 'Data tidak valid.');
        }

        PenjualanDetailModel::create([
            'penjualan_id' => $penjualan_id,
            'barang_id'    => $request->barang_id,
            'jumlah'       => $request->jumlah,
            'harga'        => $request->harga,
        ]);

        return redirect('/penjualan-detail/'. $penjualan_id)->with('success', 'Data penjualan berhasil disimpan');
    }

    public function show(string $id)
    {
        $penjualanDetail = PenjualanDetailModel::with(['penjualan', 'barang'])->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list'  => ['Home', 'Penjualan', 'Detail', 'Show']
        ];

        $page = (object) [
            'title' => 'Detail penjualan untuk ID ' . $penjualanDetail->penjualan_id
        ];

        $activeMenu = 'penjualan';

        return view('penjualanDetail.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'penjualanDetail'  => $penjualanDetail,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {

        $penjualanDetail = PenjualanDetailModel::with(['penjualan', 'barang'])->find($id);

        if (!$penjualanDetail) {
            return redirect('/penjualan')->with('error', 'Data detail penjualan tidak ditemukan');
        }

        $barangs = BarangModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Detail Penjualan',
            'list'  => ['Home', 'Penjualan', 'Detail', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Detail Penjualan'
        ];

        $activeMenu = 'penjualan';

        return view('penjualanDetail.edit', [
            'breadcrumb'       => $breadcrumb,
            'page'             => $page,
            'penjualanDetail'  => $penjualanDetail,
            'barangs'          => $barangs,
            'activeMenu'       => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'penjualan_id' => 'required', // nilai terenkripsi, tidak bisa divalidasi sebagai integer sebelum dekripsi
            'barang_id'    => 'required|integer',
            'jumlah'       => 'required|integer',
            'harga'        => 'required|numeric',
        ]);

        // Proses dekripsi penjualan_id
        try {
            $penjualan_id = decrypt($request->penjualan_id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Data tidak valid. Mungkin terjadi manipulasi data.');
        }

        // Cari data detail penjualan berdasarkan $id
        $penjualanDetail = PenjualanDetailModel::find($id);
        if (!$penjualanDetail) {
            return redirect('/penjualan')->with('error', 'Data detail penjualan tidak ditemukan');
        }

        $penjualanDetail->update([
            'penjualan_id' => $penjualan_id,
            'barang_id'    => $request->barang_id,
            'jumlah'       => $request->jumlah,
            'harga'        => $request->harga,
        ]);

        return redirect('/penjualan-detail/' . $penjualan_id)
            ->with('success', 'Data detail penjualan berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = PenjualanDetailModel::find($id);
        $penjualan_id = $check->penjualan_id;
        if (!$check) {
            return redirect('/penjualan-detail/'. $penjualan_id)->with('error', 'Data penjualan tidak ditemukan');
        }

        try {
            PenjualanDetailModel::destroy($id);
            return redirect('/penjualan-detail/'. $penjualan_id)->with('success', 'Data penjualan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika ada constraint foreign key, dsb.
            return redirect('/penjualan-detail/'. $penjualan_id)->with(
                'error',
                'Data penjualan gagal dihapus karena masih ada data lain yang terkait'
            );
        }
    }
    //====================================================================================================================================================================================================================

    //================================================================================================Jobsheet 6==========================================================================================================
    public function create_ajax($penjualan_id)
    {
        $penjualan = PenjualanModel::find($penjualan_id);

        $barangs = BarangModel::all();
        return view('penjualanDetail.create_ajax')->with(['penjualan' => $penjualan, 'barangs' => $barangs]);
    }

    // Simpan data detail penjualan baru
    public function store_ajax(Request $request)
    {
        $rules = [
            'penjualan_id' => ['required'], // Dikirim dalam bentuk terenkripsi
            'barang_id'    => ['required', 'integer'],
            'jumlah'       => ['required', 'integer'],
            'harga'        => ['required', 'numeric'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false, // response status, false: error/gagal, true: berhasil
                'message' => 'Validasi Gagal',
                'msgField' => $validator->errors() // pesan error validasi
            ]);
        }

        // Dekripsi penjualan_id
        try {
            $penjualan_id = decrypt($request->penjualan_id);
        } catch (DecryptException $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak valid.'
            ]);
        }

        $data = $request->all();
        $data['penjualan_id'] = $penjualan_id;
        PenjualanDetailModel::create($data);

        return response()->json([
            'status'  => true,
            'message' => 'Data detail penjualan berhasil disimpan'
        ]);

    }
}
