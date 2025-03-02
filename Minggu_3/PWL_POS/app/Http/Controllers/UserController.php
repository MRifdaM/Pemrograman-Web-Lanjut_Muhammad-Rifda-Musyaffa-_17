<?php

namespace App\Http\Controllers;

//memanggil UserModel
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        //Menambahkan data baru menggunakan Eloquent
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
