@extends('master')
@section('judul')
    Data Buku
@endsection

@section('content')
<div class="container-fluid">

    <a href="/buku/create" class="btn btn-primary mt-3">Tambah Data Buku</a>
    
    <table class="table mt-3">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nama Buku</th>
            <th scope="col">Genre</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Penerbit</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($buku as $index=>$item)
         <tr>
            <td>{{ $item->nama  }}</td>
            <td>{{ $item->genre }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->penerbit_id }}</td>
            <td>
                <form action="/buku/{{ $item->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/buku/{{ $item->id }}/edit" class="btn btn-warning ">Edit</a>
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
         </tr>
            @empty
                <h1>Data Sedang Kosong</h1>
            @endforelse
            
        </tbody>
      </table>
    </div>
@endsection