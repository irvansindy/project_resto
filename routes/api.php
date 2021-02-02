<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\apiProdukController;
use App\Http\Controllers\API\apiTransaksiController;
use App\Http\Controllers\API\apiCartController;
use App\Http\Controllers\API\apiCheckoutController;
use App\Http\Controllers\API\apiAuthController;

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
// API Produk
Route::get('produk', [apiProdukController::class, 'all']);

// API Cart
Route::post('cart/store', [apiCartController::class, 'store']);
Route::get('cart', [apiCartController::class, 'index']);

// API Transaksi
Route::post('checkout', [apiCheckoutController::class, 'checkout']);
Route::get('transaksi/{id}', [apiTransaksiController::class, 'index']);

// API Authentication
Route::post('logout', [apiAuthController::class, 'logout']);
Route::post('login', [apiAuthController::class, 'login']);