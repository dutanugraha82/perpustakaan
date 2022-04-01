<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Buku;
use App\Penerbit;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.daftarBuku',compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        return view('buku.createBuku',compact('penerbit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'genre' => 'required',
                'deskripsi' => 'required',
                'penerbit_id' => 'required'
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'genre.required' => 'Genre harus diisi',
                'deskripsi.required' => 'Deskripsi harus diisi',
                'penerbit_id.required' => 'Penerbit harus diisi'
            ]
        );

        $buku = new Buku;
        $buku->nama = $request->nama;
        $buku->genre = $request->genre;
        $buku->deskripsi = $request->deskripsi;
        $buku->penerbit_id = $request->penerbit_id;
        $buku->save();

        return redirect('/buku');
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
        $penerbit = Penerbit::all();
        $buku = Buku::findOrFail($id);
        return view('buku.editBuku',compact('buku','penerbit'));
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
        $request->validate(
            [
                'nama' => 'required',
                'genre' => 'required',
                'deskripsi' => 'required',
                'penerbit_id' => 'required'
            ],
            [
                'nama.required' => 'Nama penerbit harus diisi',
                'genre.required' => 'Genre harus diisi',
                'deskrips.required' => 'Deskripsi harus diisi',
                'penerbit_id.required' => 'Penerbit terbit harus diisi'
            ]
            );

            $buku = Buku::find($id);
            $buku->nama = $request->nama;
            $buku->genre = $request->genre;
            $buku->deskripsi = $request->deskripsi;
            $buku->penerbit_id = $request->penerbit_id;
            $buku->save();
            return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }
}
