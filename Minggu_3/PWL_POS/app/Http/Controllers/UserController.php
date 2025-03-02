<?php

namespace App\Http\Controllers;

//memanggil UserModel
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        //Menambahkan data baru menggunakan Eloquent
        $data = [
            'username' => 'Customer',
            'nama' => 'Pelanggan',
            'password' => Hash::make('12345'), // class untuk mengenkripsi/hash password
            'level_id' => 5
        ];

        UserModel::insert($data); //Memasukkan atau menambahkan data baru mengguankan Eloquent ORM

        //Mengambil semua data menggunakan Eloquent
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
