<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\daftar_roti;
use App\kategori;
use File;
use Session;
use Auth;

class DaftarRotiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_roti = daftar_roti::all();
        return view('backend.daftar_roti.index', compact('daftar_roti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $daftar_roti = daftar_roti::all();
        $kategori = kategori::all(); 
        return view('backend.daftar_roti.create', compact('kategori'));
    }                                                                                                            
    //  * Store a newly created resource in storage.
    //                                                                           
    
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'sejarah' => 'required|unique:daftar_rotis',
        //     'pengertian' => 'required',
        //     'manfaat' => 'required',
        //     'foto' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        // ]);

        $dftr_roti = new daftar_roti();
        $dftr_roti->nama_roti = $request->nama_roti;
        
        $dftr_roti->deskripsi = $request->deskripsi;
        $dftr_roti->id_kategori = $request->id_kategori;
        $dftr_roti->slug = Str::slug($request->nama_roti, '_');
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/daftar_roti/';
            $filename = Str::random(6) . '_'
                . $file->getClientOriginalName();
            $upload =  $file->move(
                $path,
                $filename
            );
            $dftr_roti->foto = $filename;
            
        }
        $dftr_roti->save();

        return redirect()->route('daftar_roti.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftar_roti = daftar_roti::findOrFail($id);
        return view('backend.daftar_roti.show', compact('daftar_roti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daftar_roti = daftar_roti::findOrFail($id);
        $kategori = kategori::all();

        return view('backend.daftar_roti.edit',compact('daftar_roti','kategori'));
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
        $daftar_roti = daftar_roti::findOrFail($id);
        $daftar_roti->nama_roti = $request->nama_roti;
        $daftar_roti->slug = Str::slug($request->nama_roti, '-');
        $daftar_roti->id_kategori = $request->id_kategori;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() .
                    '/assets/img/daftar_roti/';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            //hapus foto lama, jika ada
            if ($daftar_roti->foto) {
                $old_foto = $daftar_roti->foto;
                $filepath = public_path() .
                    '/assets/img/daftar_roti                                                                                                                                                                                  c' .
                    $daftar_roti->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    //File sudah dihapus/tidak ada
                }
            }
            $daftar_roti->foto = $filename;
        }
        $daftar_roti->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit <b>"
                            . $daftar_roti->judul ."</b>"
        ]);
        return redirect()->route('daftar_roti.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $daftar_roti = daftar_roti::findOrFail($id);
        if ($daftar_roti->foto) {
            $old_foto = $daftar_roti->foto;
            $filepath = public_path() . '/assets/img/daftar_roti/' . $daftar_roti->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundExceptien $e) { }
        }

        $daftar_roti->delete();
        Session::flash("flash_notification", [
            "level" => "danger",
            "message" => "Berhasil menghapus data daftar roti berjudul <b> $daftar_roti->judul </b>!"
        ]);

        return redirect()->route('daftar_roti.index');
    }
}
