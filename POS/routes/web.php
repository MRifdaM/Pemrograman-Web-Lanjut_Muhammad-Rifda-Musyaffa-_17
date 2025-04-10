<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;

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

// Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::prefix('category')->group(function () {
//     Route::get('/food-beverage', [CategoryController::class, 'foodBeverage'])
//         ->name('food-beverage');
//     Route::get('/beauty-health', [CategoryController::class, 'beautyHealth'])
//         ->name('beauty-health');
//     Route::get('/home-care', [CategoryController::class, 'homeCare'])
//         ->name('home-care');
//     Route::get('/baby-kid', [CategoryController::class, 'babyKid'])
//         ->name('baby-kid');
// });


// Route::get('/user/{id}/name/{name}', [UserController::class, 'profile'])->name('user');

// Route::get('/penjualan', [SaleController::class, 'index'])->name('sale');

Route::get('/', function () {
    return view('welcome');
});

//================================================================Jobsheet 3===========================================================================
Route::get('/level', [LevelController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/supplier', [SupplierController::class, 'index']);
Route::get('/stok', [StokController::class, 'index']);
Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/penjualan-detail', [PenjualanDetailController::class, 'index']);

//================================================================Jobsheet 4===========================================================================
//Route User
Route::get('user/tambah', [UserController::class, 'tambah']);
Route::post('user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('user/hapus/{id}', [UserController::class, 'hapus']);
//Route Level
Route::get('level/tambah', [LevelController::class, 'tambah']);
Route::post('level/tambah_simpan', [LevelController::class, 'tambah_simpan']);
Route::get('level/ubah/{id}', [LevelController::class, 'ubah']);
Route::put('level/ubah_simpan/{id}', [LevelController::class, 'ubah_simpan']);
Route::get('level/hapus/{id}', [LevelController::class, 'hapus']);
//Route Kategori
Route::get('kategori/tambah', [KategoriController::class, 'tambah']);
Route::post('kategori/tambah_simpan', [KategoriController::class, 'tambah_simpan']);
Route::get('kategori/ubah/{id}', [KategoriController::class, 'ubah']);
Route::put('kategori/ubah_simpan/{id}', [KategoriController::class, 'ubah_simpan']);
Route::get('kategori/hapus/{id}', [KategoriController::class, 'hapus']);
//Route Barang
Route::get('barang/tambah', [BarangController::class, 'tambah']);
Route::post('barang/tambah_simpan', [BarangController::class, 'tambah_simpan']);
Route::get('barang/ubah/{id}', [BarangController::class, 'ubah']);
Route::put('barang/ubah_simpan/{id}', [BarangController::class, 'ubah_simpan']);
Route::get('barang/hapus/{id}', [BarangController::class, 'hapus']);
//Route Supplier
Route::get('supplier/tambah', [SupplierController::class, 'tambah']);
Route::post('supplier/tambah_simpan', [SupplierController::class, 'tambah_simpan']);
Route::get('supplier/ubah/{id}', [SupplierController::class, 'ubah']);
Route::put('supplier/ubah_simpan/{id}', [SupplierController::class, 'ubah_simpan']);
Route::get('supplier/hapus/{id}', [SupplierController::class, 'hapus']);
//Route Stok
Route::get('stok/tambah', [StokController::class, 'tambah']);
Route::post('stok/tambah_simpan', [StokController::class, 'tambah_simpan']);
Route::get('stok/ubah/{id}', [StokController::class, 'ubah']);
Route::put('stok/ubah_simpan/{id}', [StokController::class, 'ubah_simpan']);
Route::get('stok/hapus/{id}', [StokController::class, 'hapus']);
//Route Penjualan
Route::get('penjualan/tambah', [PenjualanController::class, 'tambah']);
Route::post('penjualan/tambah_simpan', [PenjualanController::class, 'tambah_simpan']);
Route::get('penjualan/ubah/{id}', [PenjualanController::class, 'ubah']);
Route::put('penjualan/ubah_simpan/{id}', [PenjualanController::class, 'ubah_simpan']);
Route::get('penjualan/hapus/{id}', [PenjualanController::class, 'hapus']);
//Route Penjualan Detail
Route::get('penjualan-detail/tambah', [PenjualanDetailController::class, 'tambah']);
Route::post('penjualan-detail/tambah_simpan', [PenjualanDetailController::class, 'tambah_simpan']);
Route::get('penjualan-detail/ubah/{id}', [PenjualanDetailController::class, 'ubah']);
Route::put('penjualan-detail/ubah_simpan/{id}', [PenjualanDetailController::class, 'ubah_simpan']);
Route::get('penjualan-detail/hapus/{id}', [PenjualanDetailController::class, 'hapus']);

//================================================================Jobsheet 5===========================================================================
Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);             // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);        // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);    // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);          // menyimpan data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);  // menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']);
    Route::get('/{id}', [UserController::class, 'show']);        // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put("/{id}", [UserController::class, 'update']);       // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);  // menghapus data user
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);             // menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']);        // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']);    // menampilkan halaman form tambah level
    Route::post('/', [LevelController::class, 'store']);          // menyimpan data level baru
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    Route::post('/ajax', [LevelController::class, 'store_ajax']);
    Route::get('/{id}', [LevelController::class, 'show']);        // menampilkan detail level
    Route::get('/{id}/edit', [LevelController::class, 'edit']);  // menampilkan halaman form edit level
    Route::put("/{id}", [LevelController::class, 'update']);       // menyimpan perubahan data level
    Route::delete('/{id}', [LevelController::class, 'destroy']);  // menghapus data level
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
    Route::post('/ajax', [KategoriController::class, 'store_ajax']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put("/{id}", [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::post('/list', [SupplierController::class, 'list']);
    Route::get('/create', [SupplierController::class, 'create']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
    Route::post('/ajax', [SupplierController::class, 'store_ajax']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put("/{id}", [SupplierController::class, 'update']);
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
});
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
    Route::post('/ajax', [BarangController::class, 'store_ajax']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put("/{id}", [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list']);
    Route::get('/create', [StokController::class, 'create']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/create_ajax', [StokController::class, 'create_ajax']);
    Route::post('/ajax', [StokController::class, 'store_ajax']);
    Route::get('/{id}', [StokController::class, 'show']);
    Route::get('/{id}/edit', [StokController::class, 'edit']);
    Route::put("/{id}", [StokController::class, 'update']);
    Route::delete('/{id}', [StokController::class, 'destroy']);
});

Route::group(['prefix' => 'penjualan'], function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/list', [PenjualanController::class, 'list']);
    Route::get('/create', [PenjualanController::class, 'create']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']);
    Route::post('/ajax', [PenjualanController::class, 'store_ajax']);
    Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
    Route::put("/{id}", [PenjualanController::class, 'update']);
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);
});

Route::group(['prefix' => 'penjualan-detail'], function () {
    Route::get('/{penjualan_id}', [PenjualanDetailController::class, 'index']);
    Route::post('/list/{penjualan_id}', [PenjualanDetailController::class, 'list']);
    Route::get('/create/{penjualan_id}', [PenjualanDetailController::class, 'create']);
    Route::post('/', [PenjualanDetailController::class, 'store']);
    Route::get('/create_ajax/{penjualan_id}', [PenjualanDetailController::class, 'create_ajax']);
    Route::post('/ajax', [PenjualanDetailController::class, 'store_ajax']);
    Route::get('/show/{id}', [PenjualanDetailController::class, 'show']);
    Route::get('/{id}/edit', [PenjualanDetailController::class, 'edit']);
    Route::put("/{id}", [PenjualanDetailController::class, 'update']);
    Route::delete('/{id}', [PenjualanDetailController::class, 'destroy']);
});
