<?php

namespace App\Http\Controllers;

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

        $data = DB::select('select * from m_user');
        return view('user', ['data' => $data]);

    }

    // public function profile($id, $name)
    // {
    //     return view('blog.profile')
    //     ->with('id', $id)
    //     ->with('name', $name);
    // }
}
