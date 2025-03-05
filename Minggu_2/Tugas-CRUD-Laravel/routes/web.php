<?php

use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});

/*
Metode ini secara otomatis menghasilkan beberapa route HTTP yang berkaitan dengan operasi CRUD,

Parameter pertama merupakan URI dasar untuk resource. Misalnya:
GET /books akan mengakses method index pada controller.
GET /books/create akan mengakses method create.
GET /books/{book} akan mengakses method show.
------------------------------------------------

Parameter kedua menunjukkan controller yang menangani request tersebut. Laravel akan mencari dan mengasosiasikan method standar pada controller seperti:

index: Untuk menampilkan daftar semua buku.
create: Untuk menampilkan form pembuatan buku baru.
store: Untuk menyimpan data buku baru ke dalam database.
show: Untuk menampilkan detail satu buku.
edit: Untuk menampilkan form pengeditan buku.
update: Untuk memperbarui data buku yang ada.
destroy: Untuk menghapus buku.
*/
Route::resource('books',BookController::class);
