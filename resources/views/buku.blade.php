
@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- @if(Session::has('pesan'))
<div class="alert alert-success">{{Session::get('pesan')}}</div>
@endif -->

@section('content')

@yield('isi')

@if(Session::has('tambah'))
    <div class="alert alert-success">{{ Session::get('tambah') }}</div>
@endif

@if(Session::has('edit'))
    <div class="alert alert-success">{{ Session::get('edit') }}</div>
@endif

@if(Session::has('hapus'))
    <div class="alert alert-danger">{{ Session::get('hapus') }}</div>
@endif

<h2>Data Buku</h2>
<form action="{{ route('buku.search') }}" method="get">@csrf
    <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%;
    display: inline; margin-top: 10px; margin-bottom: 10px; float: left;">
</form>

<table style="background-color: white;" class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',','.') }}</td>
                <td>{{ $buku->tgl_terbit}}</td>
                <td>
                    <a href="{{route('buku.edit', $buku->id)}}">
                        <button>Update</button>
                    </a>
                    <br>
                    <form action="{{route('buku.destroy', $buku->id)}}" method="post">
                        @csrf
                        <button onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

<div>{{ $data_buku->links('pagination::bootstrap-5') }}</div>

<!-- <div><strong>Jumlah Buku:{{ $jumlah_buku }}</strong></div>

<p>Total harga Buku : {{"Rp. ".number_format($buku->sum('harga'))}}</p> -->

<!-- <p align="left"><a href="{{ route('buku.create')}}"><button>Tambah Buku</button></a></p> -->
@endsection
<!-- <h3>Jumlah Data : {{$buku->count('id')}}</h3>

<h3>Jumlah Total Harga Buku : {{"RP ".number_format($buku->sum('harga'))}}</h3> -->