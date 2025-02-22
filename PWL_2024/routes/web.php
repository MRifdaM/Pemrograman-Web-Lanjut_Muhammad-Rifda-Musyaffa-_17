<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//-------------------------------Basic Routing----------------------------------

//Membuat route '/' yang menampilkan pesan 'Selamat Datang'
Route::get('/', function () {
    return 'Selamat Datang';
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

//Membuat route '/' yang menampilkan pesan NIM dan Nama
Route::get('/about', function () {
    return 'NIM : 2341720028 <br> Nama : Muhammad Rifda Musyaffa\'';
});


//-------------------------------Routing Parameters-------------------------------
Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

//Route dengan parameter lebih dari satu
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

//Membuat route '/articles/{id}' yang menampilkan pesan 'Halaman artikel dengan ID'
Route::get('/articles/{id}', function ($id) {
    return 'Halaman artikel dengan ID '.$id;
});
