<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempat;
use App\Http\Requests\tempatRequest;


class tempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempat = Tempat::all();
        return view ('tempat.index', ['tempat'=>$tempat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tempat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tempatRequest $request)
    {
        $data = $request->all();

        Tempat::create($data);

        return redirect()->route('tempat.index');
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
        $tempat = Tempat::findOrFail($id);
        // dd($tempat);
        return view ('tempat.edit', ['tempat' => $tempat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tempatRequest $request, $id)
    {
        $data = $request->all();

        $tempat = Tempat::findOrFail($id);
        $tempat->update($data);

        return redirect()->route('tempat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tempat::findOrFail($id);
        $item->delete($id);
        
        return redirect()->route('tempat.index');
    }
}
