<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class apiCartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('produk')
                ->where('id_tempat', 1)//, auth()->user()->id
                ->latest()
                ->get();

        if($carts){
            return ResponseFormatter::success($carts, 'Data cart berhasil diambil');
        }
        else{
            return ResponseFormatter::error(null, 'Data cart gagal diambil', 404);
        }
    }
    
    public function store(Request $request)
    {
        $item = Cart::where('id_produk', $request->id_produk)
                ->where('id_tempat', $request->id_tempat);

        if ($item->count()) {
            // penambahan produk
            $item->increment('qty');
            $item = $item->first();

            // hitung total harga per 1 produk
            $harga_produk = $request->harga_produk * $item->qty;

            // update data harga
            $item->update([
                'harga_produk' => $harga_produk
            ]);
        } else {
            $item = Cart::create([
                'id_produk' => $request->id_produk,
                'id_tempat' => $request->id_tempat,
                'harga_produk' => $request->harga_produk,
                'qty' => $request->qty,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success Add To Cart',
                'qty' => $item->qty,
                'produk' => $item->produk,
            ]);
        }
    }

    public function totalHarga()
    {

    }
}
