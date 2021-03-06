@extends('master')
@section('judul')
    Input Penerbit
@endsection

@section('content')
<div class="container-fluid ml-4">
    <form class="mt-4" action="/penerbit" method="post">
        @csrf
        <div class="form-group w-50">
          <label>Nama Penerbit</label>
          <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Nama penerbit" name="nama" id="nama">
          @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="form-group w-50">
          <label>ISBN</label>
          <input type="text" class="form-control" placeholder="ISBN" name="ISBN" id="ISBN">
          @error('ISBN')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="form-group w-50">
          <label>Bahasa</label>
          <select class="form-select" aria-label="Default select example" name="bahasa">
            <option selected>Pilih Bahasa</option>
            <option value="indonesia">Indonesia</option>
            <option value="inggris">Inggris</option>
            <option value="daerah">Daerah</option>
          </select>
            @error('bahasa')
                  <div class="alert alert-danger">{{ $message }}</div>
           @enderror
          </div>

          <div class="form-group w-50">
            <label>Tanggal Terbit</label>
            <input type="date" class="form-control"  name="tanggalTerbit" id="tanggalTerbit">
            @error('tanggalTerbit')
                  <div class="alert alert-danger">{{ $message }}</div>
           @enderror
          </div>
        
        <button type="submit" class="btn btn-primary mb-4">Submit</button>
      </form>
    </div>
@endsection