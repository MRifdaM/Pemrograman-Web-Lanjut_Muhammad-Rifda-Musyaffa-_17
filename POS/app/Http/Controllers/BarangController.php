<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    public function index(){
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // return 'Insert data baru berhasil';

        // DB::insert('insert into m_barang(kategori_id, barang_kode, barang_nama, harga_jual, harga_beli, created_at) values(?, ?, ?, ?, ?, ?)', [1, 'ELT-003', 'Kipas Angin Cosmos', 120000, 90000, now()]);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::update('update m_barang set harga_jual = ? where barang_kode = ?', [110000, 'ELT-003']);
        // $row = DB::delete('delete from m_barang where barang_kode = ?', ['ELT-003']);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from m_barang');
        // return view('barang', ['data' => $data]);

    //     //=======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
    //     $data = [
    //         'kategori_id' => 1,
    //         'barang_kode' => 'ELT-003',
    //         'barang_nama' => 'Kipas Angin Cosmos',
    //         'harga_beli' => 90000,
    //         'created_at' => now()
    //         'harga_jual' => 120000,
    //     ];

    //     DB::table('m_barang')->insert($data);
    //     return 'Insert data baru berhasil';

    //     return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

    //     $row = DB::table('m_barang')->where('barang_kode', 'ELT-003')->update(['harga_jual' => '110000']);
    //     $row = DB::table('m_barang')->where('barang_kode', 'ELT-003')->delete();
    //     return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

    //     $data = DB::table('m_barang')->get();
    //     return view('barang', ['data' => $data]);

    //    // =======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
    //     $data = [
    //         'kategori_id' => '1',
    //         'barang_kode' => 'ELT-003',
    //         'barang_nama' => 'Kipas Angin Cosmos',
    //         'harga_beli' => '90000',
    //         'created_at' => now()
    //         'harga_jual' => '120000',
    //     ];

    //     BarangModel::insert($data);

    //     $data =[
        //     ];
        //         'harga_jual' => '110000'

    //     BarangModel::where('barang_kode', 'ELT-003')->update($data);

    //     $barang = BarangModel::all();
    //     return view('barang', ['data' => $barang]);

    //     //=======================================================================================Jobsheet 4 Praktikum 1============================================================================================
    //     $data = [
    //         'kategori_id' => '2',
    //         'barang_kode' => 'PKA-003',
    //         'barang_nama' => 'Jeans Carvil',
    //         'harga_beli' => '300000',
    //     ];
    //         'harga_jual' => '400000',
    //     BarangModel::create($data);

    //     $data = [
    //         'kategori_id' => '4',
    //         'barang_kode' => 'BKU-003',
    //         'barang_nama' => 'The Psychology of Money',
    //         'harga_beli' => '80000',
    //     ];
    //         'harga_jual' => '90000',
    //     BarangModel::create($data);

    //     $barang = BarangModel::all();
    //     return view('barang', ['data' => $barang]);

        //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
        // $barang = BarangModel::with('kategori')->get();
        // return view('barang', ['data' => $barang]);

        //=========================================================================================Jobsheet 5=======================================================================================================
        $breadcrumb = (object) [
            'title' => 'Daftar Barang',
            'list'  => ['Home', 'Barang']
        ];

        $page = (object) [
            'title' => 'Daftar barang yang terdaftar dalam sistem'
        ];

        $activeMenu = 'barang'; // menu aktif

        // Ambil semua data kategori untuk dropdown filter
        $kategori = KategoriModel::all();

        return view('barang.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'kategori'   => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
    // public function tambah()
    // {
    //     $kategoris = KategoriModel::all();
    //     return view('barang_tambah', ['kategoris' => $kategoris]);
    // }

    // public function tambah_simpan(Request $request)
    // {
    //     BarangModel::create([
    //         'kategori_id' => $request->kategori_id,
    //         'barang_kode' => $request->barang_kode,
    //         'barang_nama' => $request->barang_nama,
    //         'harga_beli'  => $request->harga_beli,
    //     ]);
    //         'harga_jual'  => $request->harga_jual,

    //     return redirect('/barang');
    // }

    // public function ubah($id)
    // {
    //     $barang = BarangModel::find($id);
    //     $kategoris = KategoriModel::all();
    //     return view('barang_ubah', ['data' => $barang, 'kategoris' => $kategoris]);
    // }

    // public function ubah_simpan($id, Request $request)
    // {
    //     $barang = BarangModel::find($id);

    //     $barang->kategori_id = $request->kategori_id;
    //     $barang->barang_kode = $request->barang_kode;
    //     $barang->barang_nama = $request->barang_nama;
    //     $barang->harga_beli  = $request->harga_beli;

    //     $barang->harga_jual  = $request->harga_jual;
    //     $barang->save();

    //     return redirect('/barang');
    // }

    // public function hapus($id)
    // {
    //     $barang = BarangModel::find($id);
    //     $barang->delete();

    //     return redirect('/barang');
    // }
    //=============================================================================================================================================================================================================

    //==========================================================================================Jobsheet 5=======================================================================================================
    public function list(Request $request)
    {
        // Select kolom yang ditampilkan di tabel list
        $barangs = BarangModel::select(
            'barang_id',
            'kategori_id',
            'barang_kode',
            'barang_nama'
        )
        ->with('kategori'); // relasi ke tabel kategori

        // Filter data berdasarkan kategori_id
        $kategori_id = $request->input('kategori_id');
        if (!empty($kategori)) {
            $barangs->where('m_barang.kategori_id', $kategori_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn() // kolom DT_RowIndex
            ->addColumn('aksi', function ($barangs) {
                // Tombol Detail, Edit, dan Hapus
                // $btn = '<a href="'.url('/barang/' . $barangs->barang_id).'"
                //             class="btn btn-info btn-sm">Detail</a> ';

                // $btn .= '<a href="'.url('/barang/' . $barangs->barang_id . '/edit').'"
                //             class="btn btn-warning btn-sm">Edit</a> ';

                // $btn .= '<form class="d-inline-block" method="POST"
                //             action="'.url('/barang/'.$barangs->barang_id).'">'
                //         . csrf_field()
                //         . method_field('DELETE')
                //         . '<button type="submit" class="btn btn-danger btn-sm"
                //             onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">
                //             Hapus
                //           </button></form>';
                $btn = '<button onclick="modalAction(\'' . url('/barang/' . $barangs->barang_id .
                    '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/barang/' . $barangs->barang_id .
                    '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/barang/' . $barangs->barang_id .
                    '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Menampilkan halaman form tambah barang
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Barang',
            'list'  => ['Home', 'Barang', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah barang baru'
        ];

        // Ambil data kategori untuk select
        $kategori = KategoriModel::all();
        $activeMenu = 'barang';

        return view('barang.create', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'kategori'   => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id'  => 'required|integer',
            'barang_kode'  => 'required|string|max:10|unique:m_barang,barang_kode',
            'barang_nama'  => 'required|string|max:100',
            'harga_beli'   => 'required|numeric',
            'harga_jual'   => 'required|numeric',
        ]);

        BarangModel::create([
            'kategori_id'  => $request->kategori_id,
            'barang_kode'  => $request->barang_kode,
            'barang_nama'  => $request->barang_nama,
            'harga_beli'   => $request->harga_beli,
            'harga_jual'   => $request->harga_jual,
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    public function show(string $id)
    // Menampilkan detail barang (harga_jual dan harga_beli ikut ditampilkan)
    {
        // Gunakan with('kategori') agar bisa menampilkan info kategori di detail
        $barang = BarangModel::with('kategori')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list'  => ['Home', 'Barang', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail barang'
        ];

        $activeMenu = 'barang';

        return view('barang.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'barang'     => $barang,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menampilkan halaman form edit barang
    public function edit(string $id)
    {
        $barang = BarangModel::find($id);

        // Ambil data kategori untuk select
        $kategori = KategoriModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list'  => ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit barang'
        ];

        $activeMenu = 'barang';

        return view('barang.edit', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'barang'     => $barang,
            'kategori'   => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data barang
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_id'  => 'required|integer',
            'barang_kode'  => 'required|string|max:10|unique:m_barang,barang_kode,'.$id.',barang_id',
            'barang_nama'  => 'required|string|max:100',
            'harga_beli'   => 'required|numeric',
            'harga_jual'   => 'required|numeric',
        ]);

        $barang = BarangModel::find($id);
        if (!$barang) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        $barang->update([
            'kategori_id'  => $request->kategori_id,
            'barang_kode'  => $request->barang_kode,
            'barang_nama'  => $request->barang_nama,
            'harga_beli'   => $request->harga_beli,
            'harga_jual'   => $request->harga_jual,
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }

    // Menghapus data barang
    public function destroy(string $id)
    {
        $check = BarangModel::find($id);
        if (!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            BarangModel::destroy($id);
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (QueryException $e) {
            // Jika ada constraint foreign key, dsb.
            return redirect('/barang')->with(
                'error',
                'Data barang gagal dihapus karena masih terdapat data lain yang terkait'
            );
        }
    }
    //===============================================================================================================================================================================================================

    //============================================================================================Jobsheet 6=========================================================================================================
    public function create_ajax()
    {
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        return view('barang.create_ajax')->with('kategori', $kategori);
    }

    public function store_ajax(Request $request)
    {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_id'  => ['required', 'integer'],
                'barang_kode'  => ['required', 'string', 'min:3', 'max:10', 'unique:m_barang,barang_kode'],
                'barang_nama'  => ['required', 'string', 'min:3', 'max:100'],
                'harga_beli'   => ['required', 'numeric', 'min:0'],
                'harga_jual'   => ['required', 'numeric', 'min:0']
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors() // pesan error validasi
                ]);
            }

            BarangModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data barang berhasil disimpan'
            ]);
        }

        redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $barang = BarangModel::find($id);
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        return view('barang.edit_ajax', ['barang' => $barang, 'kategori' => $kategori]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_id'  => ['required', 'integer'],
                'barang_kode'  => ['required', 'string', 'min:3', 'max:10', 'unique:m_barang,barang_kode,' . $id . ',barang_id'],
                'barang_nama'  => ['required', 'string', 'min:3', 'max:100'],
                'harga_beli'   => ['required', 'numeric', 'min:0'],
                'harga_jual'   => ['required', 'numeric', 'min:0']
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $barang = BarangModel::find($id);
            if ($barang) {
                $barang->update($request->all());

                return response()->json([
                    'status'  => true,
                    'message' => 'Data barang berhasil diupdate.',
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan.',
            ]);
        }

        return redirect('/');
    }

    public function confirm_ajax(string $id) {
        $barang = BarangModel::find($id);

        return view('barang.confirm_ajax', ['barang' => $barang]);
    }

    public function delete_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $barang = BarangModel::find($id);
            if ($barang) {
                try{
                    $barang->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch (QueryException $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data barang gagal dihapus, karena masih ada data lain yang terkait'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }

        return redirect('/');
    }

    public function show_ajax(string $id){
        $barang = BarangModel::with('kategori')->find($id);

        return view('barang.show_ajax', ['barang' => $barang]);
    }

    public function import(){
        return view('barang.import');
    }

    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {

            $rules = [
                'file_barang' => ['required', 'mimes:xlsx', 'max:1024']
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $file = $request->file('file_barang');

            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);

            $path = $file->getPathname();
            $spreadsheet = $reader->load($path);
            $sheet = $spreadsheet->getActiveSheet();

            $data = $sheet->toArray(null, false, true, true);
            $insert = [];

            if (count($data) > 1) {
                foreach ($data as $baris => $value) {
                    if ($baris > 1) {
                        $insert[] = [
                            'kategori_id' => $value['A'],
                            'barang_kode' => $value['B'],
                            'barang_nama' => $value['C'],
                            'harga_beli'  => $value['D'],
                            'harga_jual'  => $value['E'],
                            'created_at'  => now(),
                        ];
                    }
                }

                if (count($insert) > 0) {
                    BarangModel::insertOrIgnore($insert);
                }

                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil diimport'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }

        return redirect('/');
    }

    public function export_excel()
    {
        //Ambil value barang yang akan diexport
        $barang = BarangModel::select(
            'kategori_id',
            'barang_kode',
            'barang_nama',
            'harga_jual',
            'harga_beli'
        )
        ->orderBy('kategori_id')
        ->with('kategori')
        ->get();

        //load library excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); //ambil sheet aktif

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode Barang');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Harga Beli');
        $sheet->setCellValue('E1', 'Harga Jual');
        $sheet->setCellValue('F1', 'Kategori');

        $sheet->getStyle('A1:F1')->getFont()->setBold(true); // Set header bold

        $no = 1; //Nomor value dimulai dari 1
        $baris = 2; //Baris value dimulai dari 2
        foreach ($barang as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->barang_kode);
            $sheet->setCellValue('C' . $baris, $value->barang_nama);
            $sheet->setCellValue('D' . $baris, $value->harga_beli);
            $sheet->setCellValue('E' . $baris, $value->harga_jual);
            $sheet->setCellValue('F' . $baris, $value->kategori->kategori_nama); //ambil nama kategori
            $no++;
            $baris++;
        }

        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true); //set auto size untuk kolom
        }

        $sheet->setTitle('Data Barang'); //set judul sheet
        $writer = IOFactory ::createWriter($spreadsheet, 'Xlsx'); //set writer
        $filename = 'Data_Barang_' . date('Y-m-d_H-i-s') . '.xlsx'; //set nama file

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer->save('php://output'); //simpan file ke output
        exit; //keluar dari scriptA
    }

    public function export_pdf(){
        $barang = BarangModel::select(
            'kategori_id',
            'barang_kode',
            'barang_nama',
            'harga_jual',
            'harga_beli'
        )
        ->orderBy('kategori_id')
        ->orderBy('barang_kode')
        ->with('kategori')
        ->get();

        // use Barryvdh\DomPDF\Facade\Pdf;
        $pdf = PDF::loadView('barang.export_pdf', ['barang' => $barang]);
        $pdf->setPaper('A4', 'portrait'); // set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
        $pdf->render(); // render pdf

        return $pdf->stream('Data Barang '.date('Y-m-d H-i-s').'.pdf');
    }

}


