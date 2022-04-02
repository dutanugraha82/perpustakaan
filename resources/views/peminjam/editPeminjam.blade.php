@extends('master')
@section('judul')
    Input Peminjam
@endsection

@section('content')
<div class="container-fluid ml-4">
    <form class="mt-4" action="/peminjam/{{ $peminjam->id }}" method="post">
        @csrf
        @method('put')
        <div class="form-group w-50">
          <label>Nama Peminjam</label>
          <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Nama peminjam" name="nama" id="nama" value="{{ $peminjam->nama }}">
          @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="form-group w-50">
          <label>NIK</label>
          <input type="text" class="form-control" placeholder="nik" name="nik" value="{{ $peminjam->nik }}">
          @error('nik')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="form-group w-50">
            <label>No Hp</label>
            <input type="text" class="form-control" placeholder="No HP" name="nohp" value="{{ $peminjam->nohp }}">
            @error('nik')
                  <div class="alert alert-danger">{{ $message }}</div>
           @enderror
          </div>

          <div class="form-group w-50">
            <label>Alamat</label><br>
            <textarea name="alamat" style="width: 75%">{{ $peminjam->alamat }}</textarea>
              @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
  

        
        <button type="submit" class="btn btn-primary mb-4">Submit</button>
      </form>
    </div>
@endsection