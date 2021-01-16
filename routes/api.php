<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\apiProdukController;
use App\Http\Controllers\API\apiTransaksiController;
use App\Http\Controllers\API\apiCheckoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('produk', [apiProdukController::class, 'all']);
Route::post('checkout', [apiCheckoutController::class, 'checkout']);
Route::get('transaksi/{id}', [apiTransaksiController::class, 'index']);