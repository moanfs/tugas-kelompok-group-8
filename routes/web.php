<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Barang;
use App\Http\Controllers\Pembelian;
use App\Http\Controllers\Penjualan;
use App\Http\Controllers\Simulasi;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [Barang::class, 'index'])->name('/');
Route::resource('simulasi', Simulasi::class);
Route::resource('pembelian', Pembelian::class);
Route::resource('penjualan', Penjualan::class);
