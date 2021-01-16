<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class apiTransaksiController extends Controller
{
    public function index(Request $request, $id)
    {
        $produk = Transaksi::with('transaksi_detail.produk')->find($id);

        if($produk){
            return ResponseFormatter::success($produk, 'Data transaksi berhasil diambil');
        }
        else{
            return ResponseFormatter::error(null, 'Data transaksi gagal diambil', 404);
        }
    }
}
