<?php

namespace App\Http\Controllers;

use App\Peminjam;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = Peminjam::all();
        return view('peminjam.daftarPeminjam',compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjam.createPeminjam');
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
                'nik' => 'required',
                'nohp' => 'required',
                'alamat' => 'required'
            ],
            [
                'nama.required'=> 'Nama Peminjam harus diisi',
                'nik.required' => 'NIK Peminjam harus diisi',
                'nohp.required' => 'No HP Peminjam harus diisi',
                'alamat.required' => 'Alamat Peminjam harus diisi'
            ]
            );

            $peminjam = new Peminjam;
            $peminjam->nama = $request->nama;
            $peminjam->nik = $request->nik;
            $peminjam->nohp = $request->nohp;
            $peminjam->alamat = $request->alamat;
            $peminjam->save();
            
            return redirect('/peminjam');
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
        $peminjam = Peminjam::findOrFail($id);
        return view('peminjam.editPeminjam',compact('peminjam'));
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
                'nik' => 'required',
                'nohp' => 'required',
                'alamat' => 'required'
            ],
            [
                'nama.required'=> 'Nama Peminjam harus diisi',
                'nik.required' => 'NIK Peminjam harus diisi',
                'nohp.required' => 'No HP Peminjam harus diisi',
                'alamat.required' => 'Alamat Peminjam harus diisi'
            ]
            );

            $peminjam = Peminjam::find($id);
            $peminjam->nama = $request->nama;
            $peminjam->nik = $request->nik;
            $peminjam->nohp = $request->nohp;
            $peminjam->alamat = $request->alamat;
            $peminjam->save();

            return redirect('/peminjam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::find($id);
        $peminjam->delete();
        return redirect('/peminjam');
    }
}
