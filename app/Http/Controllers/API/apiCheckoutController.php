<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\checkoutRequest;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\transaksiDetail;

class apiCheckoutController extends Controller
{
    public function checkout(checkoutRequest $request)
    {
        $data = $request->except('transaksi_detail');
        $data['uuid'] = 'TRX'.mt_rand(1000,9999).mt_rand(100,999);

        $transaksi_master = Transaksi::create($data);
        
        // foreach ($request->transaksi_detail as $item) {
        //     $transaksi_detail[] = new transaksiDetail([
        //         'id_transaksi' => $transaksi_master->id,
        //         'id_produk' => $item,
        //         'harga_produk' => ,
        //         'qty' => ,
        //     ]);
        //     $transaksi_master->transaksi_detail()->saveMany($transaksi_detail);
        //     return ResponseFormatter::success($transaksi_master);
        // }
        foreach ( Cart::where('id_tempat') as $cart) {
            $transaksi_detail[] = new transaksiDetail([
                'id_transaksi' => $transaksi_master->id,
                'id_produk' => $cart->id_produk,
            ]);
        }
    }
}
