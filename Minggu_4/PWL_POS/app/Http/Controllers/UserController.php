<?php

namespace App\Http\Controllers;

//memanggil UserModel
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){


            //----------------------------------------------------Jobsheet 3 - Migration--------------------------------------------------------------------

            //Menambahkan data baru menggunakan Eloquent
            // $data = [
            //     'username' => 'customer-1',
            //     'nama' => 'Pelanggan',
            //     'password' => Hash::make('12345'), // class untuk mengenkripsi/hash password
            //     'level_id' => 5
            // ];

            // UserModel::insert($data); //Memasukkan atau menambahkan data baru mengguankan Eloquent ORM

            //Merubah data yang sudah ada menggunakan Eloquent
            // $data =[
            //     'nama' => 'Pelanggan Pertama'
            // ];

            // UserModel::where('username', 'customer-1')->update($data); //Merubah data yang sudah ada menggunakan Eloquent ORM

            // //Mengambil semua data menggunakan Eloquent
            // $user = UserModel::all();
            // return view('user', ['data' => $user]);

            //----------------------------------------------------Jobsheet 4 - Eloquent ORM--------------------------------------------------
            //-------------------------------------------------Praktikum 1------------------------------------------------------
            //Menambahkan kode untuk menambahkan data baru
            // $data = [
            //     'level_id' => 2,
            //     'username' => 'manager_dua',
            //     'nama' => 'Manager Dua',
            //     'password' => Hash::make('12345')
            // ];

            //Merubah nilai pada kolom username dan nama untuk kolom password yg tidak termasuk ke dalam variabel $fillable
            // $data = [
            //     'level_id' => 2,
            //     'username' => 'manager_tiga',
            //     'nama' => 'Manager Tiga',
            //     'password' => Hash::make('12345')
            // ];
            // UserModel::create($data); //akan error karena kolom password bukan termasuk kolom

            // $user = UserModel::all();
            // return view('user', ['data' => $user]);

            //-------------------------------------------------Praktikum 2.1------------------------------------------------------

            // $user = UserModel::find(1); //Mencari data pengguna dengan primary key ID = 1 di dalam database menggunakan Eloquent ORM

            // $user = UserModel::where('level_id', 1)->first(); //Mengambil satu data pertama dari tabel yang memiliki level_id = 1 menggunakan Eloquent

            // $user = UserModel::firstWhere('level_id', 1); //shortcut dari where()->first()

            // $user = UserModel::findOr(1, ['username', 'nama'], function(){ //Mencari data pengguna dengan primary key tetapi dengan fallback (alternatif) jika data tidak ditemukan
            //     //Jika data ditemukan, hanya kolom username dan nama yang akan diambil.
            //     abort(404); //Jika data tidak ditemukan, maka akan menampilkan error 404
            // });

            $user = UserModel::findOr(20, ['username', 'nama'], function () {
                abort(404);
            });
            return view('user', ['data' => $user]);
    }
}
