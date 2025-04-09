<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){
        //=======================================================================================Jobsheet 3 Praktikum 4========================================================================================
        // DB::insert('insert into m_user(level_id, username, nama, password, created_at) values(?, ?, ?, ?, ?)', [3, 'kasir1', 'kasir pertama', Hash::make('123456'), now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update m_user set username = ? where username = ?', ['kasirBaru', 'kasir1']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::delete('delete from m_user where username = ?', ['kasirBaru']);
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::select('select * from m_user');
        // return view('user', ['data' => $data]);

        //=======================================================================================Jobsheet 3 Praktikum 5=========================================================================================
        // $data = [
        //     'level_id' => '4',
        //     'username' => 'Customer1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('123456'),
        //     'created_at' => now(),
        // ];

        // DB::table('m_user')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_user')->where('username', 'Customer1')->update(['nama' => 'Pelanggan Pertama']);
        // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

        // $row = DB::table('m_user')->where('username', 'Customer1')->delete();
        // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

        // $data = DB::table('m_user')->get();
        // return view('user', ['data' => $data]);

        //=======================================================================================Jobsheet 3 Praktikum 6===========================================================================================
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'), // class untuk mengenkripsi/hash password
        //     'level_id' => 5
        // ];

        // UserModel::insert($data);

        // $data =[
        //     'nama' => 'Pelanggan Pertama'
        // ];

        // UserModel::where('username', 'customer-1')->update($data);

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        //=======================================================================================Jobsheet 4 Praktikum 1============================================================================================
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_dua',
        //     'nama' => 'Manager Dua',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager Tiga',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        //=======================================================================================Jobsheet 4 Praktikum 2.1============================================================================================
        // $user = UserModel::find(1); //Mencari data pengguna dengan primary key ID = 1 di dalam database menggunakan Eloquent ORM

            // $user = UserModel::where('level_id', 1)->first(); //Mengambil satu data pertama dari tabel yang memiliki level_id = 1 menggunakan Eloquent

            // $user = UserModel::firstWhere('level_id', 1); //shortcut dari where()->first()

            // $user = UserModel::findOr(1, ['username', 'nama'], function(){ //Mencari data pengguna dengan primary key tetapi dengan fallback (alternatif) jika data tidak ditemukan
            //     //Jika data ditemukan, hanya kolom username dan nama yang akan diambil.
            //     abort(404); //Jika data tidak ditemukan, maka akan menampilkan error 404
            // });

            // $user = UserModel::findOr(20, ['username', 'nama'], function () {
            //     abort(404);
            // });
            // return view('user', ['data' => $user]);

        //========================================================================================Jobsheet 4 Praktikum 2.2=============================================================================================

            // $user = UserModel::findOrFail(1); //Mencari data pengguna dengan primary key ID = 1 di dalam database, jika data tidak ditemukan maka akan menampilkan error 404 tanpa perlu menulis abort(404).

            // $user = UserModel::where('username', 'manager9')->firstOrFail(); //Mencari satu data pertama dalam database berdasarkan kriteria username = manager9, jika data tidak ditemukan maka akan menampilkan error 404 (Not Found) tanpa perlu pengecekan manual.
            // return view('user', ['data' => $user]);

        //========================================================================================Jobsheet 4 Praktikum 2.3=============================================================================================
        // $user = UserModel::where('level_id',2)->count(); //Menghitung jumlah data dalam tabel users yang memiliki level_id = 2
        // //Catatan: dd($user); (die and dump) bukan sekadar echo, tetapi metode Laravel untuk debugging. Selain menampilkan nilai variabel, dd() juga menampilkan lokasi kode yang memanggilnya.
        // // dd($user); //Menampilkan hasilnya dengan dd()
        // return view('user', ['data' => $user]);

        //========================================================================================Jobsheet 4 Praktikum 2.4=============================================================================================
        //Mencari satu data pertama yang cocok berdasarkan kondisi
            //Jika data ditemukan, Laravel mengembalikan data yang ada, Jika tidak ditemukan, Laravel akan menyimpan data baru ke database, lalu mengembalikan data tersebut.
            // $user = UserModel::firstOrCreate(
            //     [
            //         'username' => 'manager',
            //         'nama' => 'Manager'
            //     ]
            // );

            // $user = UserModel::firstOrCreate(//Akan melakukan insert data, karena data pada kode ini belum ada di database
            //     [
            //         'username' => 'manager22',
            //         'nama' => 'Manager Dua Dua',
            //         'password' => Hash::make('12345'),
            //         'level_id' => 2
            //     ]
            // );

            // $user = UserModel::firstOrNew( //Digunakan untuk mencari data pertama berdasarkan kondisi yang diberikan. Jika data ditemukan, Laravel mengembalikan object model yang sudah ada.
            //                                //Namun, jika data tidak ditemukan, Laravel akan membuat object model baru tetapi tidak langsung menyimpannya ke database. harus memanggil $model->save(); secara manual jika ingin menyimpannya.
            //     [
            //         'username' => 'manager',
            //         'nama' => 'Manager'
            //     ]
            // );

            // $user = UserModel::firstOrNew(
            //     [
            //         'username' => 'manager33',
            //         'nama' => 'Manager Tiga Tiga',
            //         'password' => Hash::make('12345'),
            //         'level_id' => 2
            //     ]
            // );
            // $user->save(); //Menyimpan data ke database
            //---------------------------------------------------Praktikum 2.5-------------------------------------------------------
            // $user = UserModel::create([
            //     'username' => 'manager55',
            //     'nama' => 'Manager55',
            //     'password' => Hash::make('12345'),
            //     'level_id' => 2,
            // ]);

            // $user->username = 'manager56'; //variabel $user mengalami perubahan

            // //isDirty() digunakan untuk mengecek apakah model telah diubah sebelum disimpan.
            // //isClean() digunakan untuk mengecek apakah model masih sama seperti di database (belum diubah).


            // $user->isDirty(); // true
            // $user->isDirty('username'); // true
            // $user->isDirty('nama'); // false
            // $user->isDirty(['nama', 'username']); // true

            // $user->isClean(); // false
            // $user->isClean('username'); // false
            // $user->isClean('nama'); // true
            // $user->isClean(['nama', 'username']); // false

            // $user->save(); // data sudah disimpan ke database, sehingga variabel $user diangap bersih atau tidak ada perubahan

            // $user->isDirty(); // false
            // $user->isClean(); // true
            // dd($user->isDirty());


            // $user = UserModel::create([
            //     'username' => 'manager11',
            //     'nama' => 'Manager11',
            //     'password' => Hash::make('12345'),
            //     'level_id' => 2,
            // ]);

            // $user->username = 'manager12';

            // $user->save();

            // //wasChanged() digunakan untuk mengecek apakah perubahan benar-benar disimpan ke database setelah save().

            // $user->wasChanged(); // true
            // $user->wasChanged('username'); // true
            // $user->wasChanged(['username', 'level_id']); // true
            // $user->wasChanged('nama'); // false
            // dd($user->wasChanged(['nama', 'username'])); // true

            //==========================================================================================Jobsheet 4 Praktikum 2.6========================================================================================
            $user = UserModel::with('level')->get();
            return view('user', ['data' => $user]);
    }

    //==========================================================================================Jobsheet 4 Praktikum 2.6=========================================================================================
    public function tambah(){
        $levels = LevelModel::all();
        return view('user_tambah', ['levels' => $levels]);
    }

    public function tambah_simpan(Request $request) //Fungsi ini menerima request dari form yang dikirim oleh pengguna.
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id){
        $levels = LevelModel::all();
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user, 'levels' => $levels]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
    //=======================================================================================================================================================================================================

    // public function profile($id, $name)
    // {
    //     return view('blog.profile')
    //     ->with('id', $id)
    //     ->with('name', $name);
    // }
}
