<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use Illuminate\Support\Facades\DB;
use App\Models\PenjualanDetailModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
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
                $btn = '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualans->penjualan_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                // $btn .= '<a href="'.url('/penjualan/' . $penjualans->penjualan_id . '/edit').'"
                //             class="btn btn-warning btn-sm">Edit</a> ';

                // $btn .= '<form class="d-inline-block" method="POST"
                //             action="'.url('/penjualan/'.$penjualans->penjualan_id).'">'
                //         . csrf_field()
                //         . method_field('DELETE')
                //         . '<button type="submit" class="btn btn-danger btn-sm"
                //             onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">
                //             Hapus
                //           </button></form>';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualans->penjualan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';

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
        $barangs = BarangModel::withSum('stok', 'stok_jumlah')->get();
        return view('penjualan.create_ajax')->with(['users' => $users, 'barangs' => $barangs]);
    }

    public function store_ajax(Request $request)
    {
        $rules = [
            'user_id'           => ['required', 'integer'],
            'pembeli'           => ['required', 'string', 'max:100'],
            'penjualan_kode'    => ['required', 'string', 'max:20', 'unique:t_penjualan,penjualan_kode'],
            'penjualan_tanggal' => ['required', 'date'],
            'details'           => ['required', 'array', 'min:1'],
            'details.*.barang_id' => ['required', 'integer'],
            'details.*.jumlah'    => ['required', 'integer', 'min:1'],
            'details.*.harga'     => ['required', 'numeric'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => false,
                'message'  => 'Validasi Gagal',
                'msgField' => $validator->errors()
            ]);
        }

        DB::beginTransaction();
        try {
            $penjualan = PenjualanModel::create($request->only([
                'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'
            ]));

            foreach ($request->details as $index => $detail) {
                $stokBarang = StokModel::where('barang_id', $detail['barang_id'])->first();

                if (!$stokBarang || $stokBarang->stok_jumlah < 1) {
                    DB::rollBack();
                    return response()->json([
                        'status'  => false,
                        'message' => 'Stok barang tidak tersedia atau habis pada baris ke-' . ($index + 1)
                    ]);
                }

                if ($detail['jumlah'] > $stokBarang->stok_jumlah) {
                    DB::rollBack();
                    return response()->json([
                        'status'  => false,
                        'message' => 'Jumlah yang diminta melebihi stok yang tersedia pada baris ke-' . ($index + 1)
                    ]);
                }

                $stokBarang->stok_jumlah -= $detail['jumlah'];
                $stokBarang->save();

                PenjualanDetailModel::create([
                    'penjualan_id' => $penjualan->penjualan_id,
                    'barang_id'    => $detail['barang_id'],
                    'jumlah'       => $detail['jumlah'],
                    'harga'        => $detail['harga'],
                ]);
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 'Data penjualan beserta detail berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => false,
                'message' => 'Terjadi kesalahan saat menyimpan data. ' . $e->getMessage()
            ]);
        }
    }

    public function show_ajax($id)
    {
        $penjualan = PenjualanModel::with(['user', 'penjualanDetail.barang'])->find($id);

        $penjualanDetail = $penjualan->penjualanDetail;

        return view('penjualan.show_ajax', ['penjualanDetail' => $penjualanDetail]);
    }

    public function confirm_ajax($id)
    {
        $penjualan = PenjualanModel::with(['penjualanDetail.barang', 'user'])->find($id);
        return view('penjualan.confirm_ajax', ['penjualan' => $penjualan]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $penjualan = PenjualanModel::find($id);
            if ($penjualan) {
                $penjualan->delete();
                return response()->json([
                    'status'  => true,
                    'message' => 'Data penjualan beserta detailnya berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data penjualan tidak ditemukan'
                ]);
            }
        }
    }

    public function export_excel()
    {
        // Ambil semua penjualan beserta relasi user dan detail->barang
        $penjualans = PenjualanModel::with(['user', 'penjualanDetail.barang'])
            ->orderBy('penjualan_tanggal')
            ->get();

        // Buat objek spreadsheet dan sheet pertama
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Master Penjualan');

        // Header untuk sheet Master
        $sheet1->setCellValue('A1', 'No');
        $sheet1->setCellValue('B1', 'User');
        $sheet1->setCellValue('C1', 'Pembeli');
        $sheet1->setCellValue('D1', 'Kode Penjualan');
        $sheet1->setCellValue('E1', 'Tanggal Penjualan');
        $sheet1->getStyle('A1:E1')->getFont()->setBold(true);

        // Isi data master
        $row = 2;
        $no = 1;
        foreach ($penjualans as $penjualan) {
            $sheet1->setCellValue("A{$row}", $no);
            $sheet1->setCellValue("B{$row}", $penjualan->user->username);
            $sheet1->setCellValue("C{$row}", $penjualan->pembeli);
            $sheet1->setCellValue("D{$row}", $penjualan->penjualan_kode);
            $sheet1->setCellValue("E{$row}", date('Y-m-d H:i:s', strtotime($penjualan->penjualan_tanggal)));
            $no++;
            $row++;
        }

        // Auto‑size kolom sheet1
        foreach (range('A','E') as $col) {
            $sheet1->getColumnDimension($col)->setAutoSize(true);
        }

        // Buat sheet kedua untuk detail
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Detail Penjualan');

        // Header untuk sheet Detail
        $sheet2->setCellValue('A1', 'No');
        $sheet2->setCellValue('B1', 'Kode Penjualan');
        $sheet2->setCellValue('C1', 'Nama Barang');
        $sheet2->setCellValue('D1', 'Jumlah');
        $sheet2->setCellValue('E1', 'Harga');
        $sheet2->getStyle('A1:E1')->getFont()->setBold(true);

        // Isi data detail
        $row = 2;
        $no = 1;
        foreach ($penjualans as $penjualan) {
            foreach ($penjualan->penjualanDetail as $detail) {
                $sheet2->setCellValue("A{$row}", $no);
                $sheet2->setCellValue("B{$row}", $penjualan->penjualan_kode);
                $sheet2->setCellValue("C{$row}", $detail->barang->barang_nama);
                $sheet2->setCellValue("D{$row}", $detail->jumlah);
                $sheet2->setCellValue("E{$row}", $detail->harga);
                $no++;
                $row++;
            }
        }

        // Auto‑size kolom sheet2
        foreach (range('A','E') as $col) {
            $sheet2->getColumnDimension($col)->setAutoSize(true);
        }

        // Kirim header untuk download
        $writer   = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data_Penjualan_Detail_' . date('Y-m-d_H-i-s') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. $filename .'"');
        header('Cache-Control: max-age=0');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: '. gmdate('D, d M Y H:i:s') .' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer->save('php://output');
        exit;
    }
}
