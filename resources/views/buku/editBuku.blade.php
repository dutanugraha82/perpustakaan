@extends('master')
@section('judul')
    Input Buku
@endsection

@section('content')
<div class="container-fluid ml-4">
    <form class="mt-4" action="/buku" method="post">
        @csrf
        <div class="form-group w-50">
          <label>Nama Buku</label>
          <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Nama penerbit" name="nama" value="{{ $buku->nama }}">
          @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="form-group w-50">
          <label>genre</label>
          <input type="text" class="form-control" placeholder="genre" name="genre" value="{{ $buku->genre }}">
          @error('genre')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="form-group w-50">
          <label>Deskripsi</label><br>
          <textarea name="deskripsi" style="width: 75%">{{ $buku->deskripsi }}</textarea>
            @error('deskrips')
                  <div class="alert alert-danger">{{ $message }}</div>
           @enderror
          </div>

          <div class="form-group w-50">
            <label>Penerbit</label>
            <select name="penerbit_id" id="" class="form-control">
                <option value="">Pilih Penerbit</option>
                @foreach ($penerbit as $item)
                    @if ($item->id === $buku->penerbit_id)
                        <option value="{{ $item->nama }}" selected>{{ $item->nama }}</option>
                    @else
                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                    @endif
                @endforeach
            </select>
            @error('penerbit')
                  <div class="alert alert-danger">{{ $message }}</div>
           @enderror
          </div>
        
        <button type="submit" class="btn btn-primary mb-4">Submit</button>
      </form>
    </div>
@endsection