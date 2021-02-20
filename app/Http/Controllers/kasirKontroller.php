<?php

namespace App\Http\Controllers;

use App\Http\Requests\kasirRequest;
use Illuminate\Http\Request;
use App\Models\Kasir;

class kasirKontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = Kasir::all();
        return view('kasir.index2', ['kasir'=>$kasir]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(kasirRequest $request)
    {
        $data = $request->all();
        Kasir::create($data);
        
        return redirect()->route('kasir.index');
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
        $kasir = Kasir::findOrFail($id);
        return view('kasir.edit', ['kasir'=>$kasir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(kasirRequest $request, $id)
    {
        $data = $request->all();

        $kasir = Kasir::findOrFail($id);
        $kasir->update($data);

        return redirect()->route('kasir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kasir::findOrFail($id);
        $item->delete($id);
        
        return redirect()->route('kasir.index');
    }
}
