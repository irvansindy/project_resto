<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class apiProdukController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_produk = $request->input('nama_produk');
        $slug = $request->input('slug');
        $jenis = $request->input('jenis');
        $harga = $request->input('harga');

        if($id){
            $produk = Produk::find($id);
            if ($produk) {
                return ResponseFormatter::success($produk, 'Success');
            } else {
                return ResponseFormatter::error(NULL, 'Error', 404);
            }
        }

        if($slug){
            $produk = Produk::where('slug', $slug)->first();
            if ($produk) {
                return ResponseFormatter::success($produk, 'Success');
            } else {
                return ResponseFormatter::error(NULL, 'Error', 404);
            }
        }

        $produk = Produk::paginate($limit);

        if($nama_produk){
            $produk->where('nama_produk', 'like', '%'.$nama_produk.'$');
        }
        if($jenis){
            $produk->where('jenis', 'like', '%'.$jenis.'$');
        }
        if($harga){
            $produk->where('harga', '>=', '%'.$harga.'$');
        }

        return ResponseFormatter::success(
            $produk, 
            'Success'
        );
    }
}
