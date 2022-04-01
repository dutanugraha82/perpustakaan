@extends('master')
@section('judul')
    Data Penerbit
@endsection

@section('content')
<div class="container-fluid">

    <a href="/penerbit/create" class="btn btn-primary mt-3">Tambah Data Penerbit</a>
    
    <table class="table mt-3">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nama Penerbit</th>
            <th scope="col">ISBN</th>
            <th scope="col">Bahasa</th>
            <th scope="col">Tanggal Terbit</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($penerbit as $index=>$item)
         <tr>
            <td>{{ $item->nama  }}</td>
            <td>{{ $item->ISBN }}</td>
            <td>{{ $item->bahasa }}</td>
            <td>{{ $item->tanggalTerbit }}</td>
            <td>
                <form action="/penerbit/{{ $item->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/penerbit/{{ $item->id }}/edit" class="btn btn-warning ">Edit</a>
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