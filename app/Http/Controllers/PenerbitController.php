<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Penerbit;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.daftarPenerbit',compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.createPenerbit');
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
                'ISBN' => 'required',
                'bahasa' => 'required',
                'tanggalTerbit' => 'required'
            ],
            [
                'nama.required' => 'Nama penerbit harus diisi',
                'ISBN.required' => 'ISBN harus diisi',
                'bahasa' => 'Bahasa harus diisi',
                'tanggalTerbit' => 'Tanggal terbit harus diisi'
            ]
            );

            $penerbit = new Penerbit;
            $penerbit->nama = $request->nama;
            $penerbit->ISBN = $request->ISBN;
            $penerbit->bahasa = $request->bahasa;
            $penerbit->tanggalTerbit = $request->tanggalTerbit;
            $penerbit->save();
            return redirect('/penerbit');
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
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.editPenerbit', compact('penerbit'));
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
                'ISBN' => 'required',
                'bahasa' => 'required',
                'tanggalTerbit' => 'required'
            ],
            [
                'nama.required' => 'Nama penerbit harus diisi',
                'ISBN.required' => 'ISBN harus diisi',
                'bahasa' => 'Bahasa harus diisi',
                'tanggalTerbit' => 'Tanggal terbit harus diisi'
            ]
            );

            $penerbit = Penerbit::find($id);
            $penerbit->nama = $request->nama;
            $penerbit->ISBN = $request->ISBN;
            $penerbit->bahasa = $request->bahasa;
            $penerbit->tanggalTerbit = $request->tanggalTerbit;
            $penerbit->save();
            return redirect('/penerbit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->delete();
        return redirect('/penerbit');
    }
}
