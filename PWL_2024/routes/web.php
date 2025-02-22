<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
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
// Route::get('/', function () {
//     return 'Selamat Datang';
// });

// Route::get('/hello', function () {
//     return 'Hello World';
// });

Route::get('/world', function () {
    return 'World';
});

//Membuat route '/' yang menampilkan pesan NIM dan Nama
// Route::get('/about', function () {
//     return 'NIM : 2341720028 <br> Nama : Muhammad Rifda Musyaffa\'';
// });


//-------------------------------Routing Parameters-------------------------------
// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya '.$name;
// });

//Route dengan parameter lebih dari satu
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

//Membuat route '/articles/{id}' yang menampilkan pesan 'Halaman artikel dengan ID'
// Route::get('/articles/{id}', function ($id) {
//     return 'Halaman artikel dengan ID '.$id;
// });


//-----------------------------Routing Optional Parameters-------------------------

/*membuat route /user sekaligus mengirimkan parameter berupa nama user $name dimana parameternya bersifat opsional
* karena $name memiliki nilai default
*/

// Route::get('/user/{name?}', function ($name=null) {
//     return 'Nama saya '.$name;
// });

/*merubah route /user/{name?}'dimana parameternya akan memiliki nilai default 'John'
*yang digunakan saat tidak ada nilai parameter yang diberikan dari URL
*/
Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});


//-----------------------------Routing Controllers--------------------------
/*
*Membuat route dengan URL '/hello' yang akan mengakses/mengarahkan ke controller WelcomeController
*dan method hello()
*/
// Route::get('/hello', [WelcomeController::class, 'hello']);

/*Membuat route dengan URL '/' yang akan mengakses/mengarahkan ke controller PageController
*dan method index()
*/
// Route::get('/', [PageController::class, 'index']);

/*Membuat route dengan URL '/about' yang akan mengakses/mengarahkan ke controller PageController
*dan method about()
*/
// Route::get('/about', [PageController::class, 'about']);

/*Membuat route dengan URL '/articles/{id}' yang akan mengakses/mengarahkan ke controller PageController
*dan method articles()
*/
// Route::get('/articles/{id}', [PageController::class, 'articles']);

//membuat route home yang mengarahkan ke controller HomeController dengan method index()
Route::get('/', [HomeController::class, 'index']);

//membuat route about yang mengarahkan ke controller AboutController dengan method about()
Route::get('/about', [AboutController::class, 'about']);

//membuat route articles yang mengarahkan ke controller ArticleController dengan method articles()
Route::get('/articles/{id}', [ArticleController::class, 'articles']);


//----------------------------------Routing Resource Controller-------------------------------------
//membuat routing untuk resouce controller PhotoController
Route::resource('photos', PhotoController::class);

//method only() digunakan untuk memilih route tertentu yang ingin digunakan.
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

//method except() digunakan untuk mengecualikan route tertentu yang tidak ingin digunakan.
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);


//---------------------------------------------Routing View----------------------------------------
//membuat route '/greeting' yang menampilkan view hello.blade.php dan mengirimkan data 'name' dengan nilai 'Muhammad Rifda Musyaffa'
// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'Muhammad Rifda Musyaffa\'']);
// });

//membuat route '/greeting' yang mengarahkan ke controller WelcomeController dengan method greeting()
Route::get('/greeting', [WelcomeController::class,'greeting']);

