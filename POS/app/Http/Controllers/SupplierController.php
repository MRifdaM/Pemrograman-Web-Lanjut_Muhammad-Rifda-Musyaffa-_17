<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

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
        // $supplier = SupplierModel::all();
        // return view('supplier', ['data' => $supplier]);

        //=======================================================================================Jobsheet 5=======================================================================================================
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $page = (object) [
            'title' => 'Daftar supplier yang terdaftar dalam sistem'
        ];

        $activeMenu = 'supplier'; // set menu yang sedang aktif

        return view('supplier.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'activeMenu' => $activeMenu
        ]);
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

    //=======================================================================================Jobsheet 5=======================================================================================================
    public function list()
    {
        // Ambil hanya kolom supplier_id, supplier_kode, supplier_nama
        $suppliers = SupplierModel::select('supplier_id', 'supplier_kode', 'supplier_nama');

        return DataTables::of($suppliers)
            ->addIndexColumn()
            ->addColumn('aksi', function ($suppliers) {
                // Tampilkan tombol Detail, Edit, Hapus
                // $btn = '<a href="'.url('/supplier/' . $suppliers->supplier_id).'"
                //             class="btn btn-info btn-sm">Detail</a> ';

                // $btn .= '<a href="'.url('/supplier/' . $suppliers->supplier_id . '/edit').'"
                //             class="btn btn-warning btn-sm">Edit</a> ';

                // $btn .= '<form class="d-inline-block" method="POST"
                //             action="'.url('/supplier/'.$suppliers->supplier_id).'">'
                //         . csrf_field()
                //         . method_field('DELETE')
                //         .'<button type="submit" class="btn btn-danger btn-sm"
                //             onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">
                //             Hapus
                //         </button></form>';
                $btn = '<button onclick="modalAction(\'' . url('/supplier/' . $suppliers->supplier_id .
                    '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $suppliers->supplier_id .
                    '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $suppliers->supplier_id .
                    '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // Kolom aksi berisi HTML
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list'  => ['Home', 'Supplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah supplier baru'
        ];

        $activeMenu = 'supplier';

        return view('supplier.create', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_kode'  => 'required|string|max:10|unique:m_supplier,supplier_kode',
            'supplier_nama'  => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
        ]);

        SupplierModel::create([
            'supplier_kode'  => $request->supplier_kode,
            'supplier_nama'  => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
        ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil disimpan');
    }

    public function show(string $id)
    {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list'  => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'supplier'   => $supplier,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list'  => ['Home', 'Supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.edit', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'supplier'   => $supplier,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Perhatikan validasi unique: menambahkan pengecualian ID
        $request->validate([
            'supplier_kode'  => 'required|string|max:10|unique:m_supplier,supplier_kode,'.$id.',supplier_id',
            'supplier_nama'  => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
        ]);

        // Update data
        $supplier = SupplierModel::find($id);
        if (!$supplier) {
            return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        }

        $supplier->update([
            'supplier_kode'  => $request->supplier_kode,
            'supplier_nama'  => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
        ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = SupplierModel::find($id);
        if (!$check) {
            return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        }

        try {
            SupplierModel::destroy($id);
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        } catch (QueryException $e) {
            return redirect('/supplier')->with(
                'error',
                'Data supplier gagal dihapus karena masih terkait dengan data lain'
            );
        }
    }
    //=========================================================================================================================================================================================================

    //========================================================================================Jobsheet 6=======================================================================================================
    public function create_ajax()
    {
        return view('supplier.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode'   => ['required', 'string', 'max:10', 'unique:m_supplier,supplier_kode'],
                'supplier_nama'   => ['required', 'string', 'max:100'],
                'supplier_alamat' => ['required', 'string', 'max:255']
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors() // pesan error validasi
                ]);
            }

            SupplierModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data supplier berhasil disimpan'
            ]);
        }

        redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $supplier = SupplierModel::find($id);
        return view('supplier.edit_ajax', ['supplier' => $supplier]);
    }

    public function update_ajax(Request $request, string $id)
    {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode'   => ['required', 'string', 'max:10', 'unique:m_supplier,supplier_kode,'.$id.',supplier_id'],
                'supplier_nama'   => ['required', 'string', 'max:100'],
                'supplier_alamat' => ['required', 'string', 'max:255']
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors() // pesan error validasi
                ]);
            }

            $supplier = SupplierModel::find($id);

            if ($supplier) {
                $supplier->update($request->all());

                return response()->json([
                    'status'  => true,
                    'message' => 'Data supplier berhasil diupdate.',
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan.',
            ]);
        }

        redirect('/');
    }

    public function confirm_ajax(string $id) {
        $supplier = SupplierModel::find($id);

        return view('supplier.confirm_ajax', ['supplier' => $supplier]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {

            $supplier = SupplierModel::find($id);
            if ($supplier) {
                try{
                    $supplier->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch(QueryException $e){
                    return response()->json([
                        'status' => false,
                        'message' => 'Data supplier gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini.'
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
        $supplier = SupplierModel::find($id);

        return view('supplier.show_ajax', ['supplier' => $supplier]);
    }

    public function import(){
        return view('supplier.import');
    }

    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {

            $rules = [

                'file_supplier' => ['required', 'mimes:xlsx', 'max:1024']
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $file = $request->file('file_supplier');

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
                            'supplier_kode' => $value['A'],
                            'supplier_nama' => $value['B'],
                            'supplier_alamat' => $value['C'],
                            'created_at'  => now(),
                        ];
                    }
                }

                if (count($insert) > 0) {
                    SupplierModel::insertOrIgnore($insert);
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
        $supplier = SupplierModel::select(
            'supplier_kode',
            'supplier_nama',
            'supplier_alamat'
        )
        ->orderBy('supplier_id')
        ->get();

        //load library excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); //ambil sheet aktif

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode Supplier');
        $sheet->setCellValue('C1', 'Nama Supplier');
        $sheet->setCellValue('D1', 'Alamat Supplier');

        $sheet->getStyle('A1:D1')->getFont()->setBold(true); // Set header bold

        $no = 1; //Nomor value dimulai dari 1
        $baris = 2; //Baris value dimulai dari 2
        foreach ($supplier as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->supplier_kode);
            $sheet->setCellValue('C' . $baris, $value->supplier_nama);
            $sheet->setCellValue('D' . $baris, $value->supplier_alamat);
            $no++;
            $baris++;
        }

        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true); //set auto size untuk kolom
        }

        $sheet->setTitle('Data Supplier'); //set judul sheet
        $writer = IOFactory ::createWriter($spreadsheet, 'Xlsx'); //set writer
        $filename = 'Data_Supplier_' . date('Y-m-d_H-i-s') . '.xlsx'; //set nama file

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
        $supplier = SupplierModel::select(
            'supplier_kode',
            'supplier_nama',
            'supplier_alamat'
        )
        ->orderBy('supplier_id')
        ->orderBy('supplier_kode')
        ->get();

        // use Barryvdh\DomPDF\Facade\Pdf;
        $pdf = PDF::loadView('supplier.export_pdf', ['supplier' => $supplier]);
        $pdf->setPaper('A4', 'portrait'); // set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
        $pdf->render(); // render pdf

        return $pdf->stream('Data Supplier '.date('Y-m-d H-i-s').'.pdf');
    }
}
