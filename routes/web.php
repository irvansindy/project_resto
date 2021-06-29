<?php

use App\Http\Controllers\produkController;
use App\Http\Controllers\tempatController;
use App\Http\Controllers\kasirKontroller;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::resource('produk', produkController::class)->middleware('auth:sanctum');
Route::resource('tempat', tempatController::class)->middleware('auth:sanctum');
Route::resource('kasir', kasirKontroller::class)->middleware('auth:sanctum');
Route::resource('transaksi', transaksiController::class)->middleware('auth:sanctum');
Route::get('transaksi/{id}/status/{status}', [transaksiController::class, 'changeStatus'])->name('transaksi.changeStatus')->middleware('auth:sanctum');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/modal', [UserController::class, 'modal'])->name('users.modal');