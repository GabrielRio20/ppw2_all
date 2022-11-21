@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

@section('content')

@yield('isi')

<h2>Galeri Buku</h2>

<table style="background-color: white;" class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($galeri as $data)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $data->nama_galeri }}</td>
            <td>{{ $data->albums->judul }}</td>
            <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px;"></td>
            <td>
                <form action="{{ route('galeri.destroy', $data->id) }}" method="post">@csrf
                <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i> Edit</a>
                {{-- <a href="{{ route('galeri.buku', $data->judul) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i> Detail</a> --}}
                <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus')">
                    <i class="fa fa-pencil-alt"></i> Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection