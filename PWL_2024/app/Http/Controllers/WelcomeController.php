<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //method hello() yang akan mengembalikan pesan 'Hello World'
    public function hello() {
        return 'Hello World';
    }

}
