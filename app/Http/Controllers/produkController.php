<?php

namespace App\Http\Controllers;

use App\Http\Requests\produkRequest;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view ('produk.index', ['produk' => $produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(produkRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_produk, '-'); 
        $data['foto'] = $request->file('foto')->store(
            'asset/produk', 'public'
        );
        // dd($data['foto']);
        Produk::create($data);
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = produk::findOrFail($id);
        
        return view ('produk.edit', ['item'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(produkRequest $request, $id)
    {
        if ($request->file('foto') == NULL) {
            $item = Produk::findOrFail($id);
            $data = $request->all();
            $data['slug'] = Str::slug($request->nama_produk);
            $item->update($data);
        } else {
            $item = Produk::findOrFail($id);
            
            // hapus foto lama
            Storage::disk('local')->delete('asset/produk' . $item->foto);
            
            $data = $request->all();
            $data['slug'] = Str::slug($request->nama_produk);
            $data['foto'] = $request->file('foto')->store(
                'asset/produk', 'public'
            );
            $item->update($data);
        }
        
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Produk::findOrFail($id);
        Storage::disk('local')->delete('asset/produk' . $item->foto);
        $item->delete($id);
        
        return redirect()->route('produk.index');

    }
}
