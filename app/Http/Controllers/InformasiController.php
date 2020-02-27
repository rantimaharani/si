<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\informasi;


class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = informasi::all();
        return view('backend.informasi.index', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informasi = informasi::all();
        return view('backend.informasi.create', compact('informasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $informasi = new informasi();
        $informasi->sejarah = $request->sejarah;
        $informasi->pengertian = $request->pengertian;
        $informasi->manfaat = $request->manfaat;
        $informasi->save();

        return redirect()->route('informasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informasi = informasi::findOrFail($id);
        return view('backend.informasi.show', compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi = informasi::findOrFail($id);
        return view('backend.informasi.edit',compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $informasi = informasi::findOrFail($id);
        $informasi->sejarah = $request->sejarah;
        $informasi->pengertian = $request->pengertian;
        $informasi->manfaat = $request->manfaat;
        $informasi->save();

        return redirect()->route('informasi.index');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi = informasi::findOrFail($id);
        $ol = $informasi->informasi;
        $informasi->delete();
        return redirect()->route('informasi.index');
    }
}
