<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [CategoryController::class, 'foodBeverage'])
        ->name('food-beverage');
    Route::get('/beauty-health', [CategoryController::class, 'beautyHealth'])
        ->name('beauty-health');
    Route::get('/home-care', [CategoryController::class, 'homeCare'])
        ->name('home-care');
    Route::get('/baby-kid', [CategoryController::class, 'babyKid'])
        ->name('baby-kid');
});


Route::get('/user/{id}/name/{name}', [UserController::class, 'profile'])->name('user');

Route::get('/penjualan', [SaleController::class, 'index'])->name('sale');
