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
            //Menambahkan kode untuk menambahkan data baru
            $data = [
                'level_id' => 2,
                'username' => 'manager_dua',
                'nama' => 'Manager Dua',
                'password' => Hash::make('12345')
            ];
            UserModel::create($data);

            $user = UserModel::all();
            return view('user', ['data' => $user]);
    }
}
