<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\checkoutRequest;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\transaksiDetail;
use App\Models\Cart;

class apiCheckoutController extends Controller
{
    public function checkout(checkoutRequest $request)
    {
        // $data = $request->except('transaksi_detail');
        $data = $request->all();
        $data['uuid'] = 'TRX'.mt_rand(1000,9999).mt_rand(100,999);

        $transaksi_master = Transaksi::create($data);
        
        foreach (Cart::where('id_tempat', $request->id_tempat) as $cart) {
            // insert Produk Ke tabel transaksi detail
            $transaksi_master->transaksi_detail()->create([
                'id_transaksi' => $transaksi_master->id,
                'id_produk' => $cart->id_produk,
                'harga_produk' => $cart->harga_produk,
                'qty' => $cart->qty,
            ]);
        }

        return ResponseFormatter::success($transaksi_master, 'Checkout berhasil');
        
    }
}
