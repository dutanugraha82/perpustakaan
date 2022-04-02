@extends('master')
@section('judul')
    Data Peminjam
@endsection

@section('content')
<div class="container-fluid">

    <a href="/peminjam/create" class="btn btn-primary mt-3">Tambah Data Peminjam</a>
    
    <table class="table mt-3">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nama Peminjam</th>
            <th scope="col">NIK</th>
            <th scope="col">No HP</th>
            <th scope="col">Alamat</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($peminjam as $item)
         <tr>
            <td>{{ $item->nama  }}</td>
            <td>{{ $item->nik }}</td>
            <td>{{ $item->nohp }}</td>
            <td>{{ $item->alamat }}</td>
            <td>
                <form action="/peminjam/{{ $item->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/peminjam/{{ $item->id }}/edit" class="btn btn-warning ">Edit</a>
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