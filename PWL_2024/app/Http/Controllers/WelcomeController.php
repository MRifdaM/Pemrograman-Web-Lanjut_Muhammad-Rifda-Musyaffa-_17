<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //method hello() yang akan mengembalikan pesan 'Hello World'
    public function hello() {
        return 'Hello World';
    }

    //menambahkan method greeting() yang akan mengembalikan view dengan nama hello.blade.php dan mengirim data name ke view tersebut
    // public function greeting(){
    //     return view('blog.hello', ['name' => 'Muhammad Rifda Musyaffa\'']);
    // }

    //mengubah method greeting() yang akan mengembalikan view dengan nama hello.blade.php dan mengirim data name dan occupation ke view tersebut
    //menggunakan method with()
    public function greeting(){
        return view('blog.hello')
        ->with('name', 'Muhammad Rifda Musyaffa')
        ->with('occupation', 'Mahasiswa');
    }
}
