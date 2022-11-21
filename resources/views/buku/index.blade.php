
@extends('layouts.app')

@section('content')
@if(Session::has('pesan'))
    <div class="alert alert-success">{{ Session::get('pesan') }}</div>
@endif

<form action="{{ route('buku.search') }}" method="get">@csrf
    <input type="text" name="kata" class="form-control" placeholder="Cari..." style="width: 30%; display: inline; margin-top:10px; margin-bottom:10px; float: right;">
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl Terbit</th>
            <th>Aksi</th>
            
        </tr>
    </thead>

    <tbody>
        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp".number_format($buku->harga, 0, ',', ',') }}</td>
                <td>{{ $buku->tgl_terbit }}</td>
                <td>
                    <a href="{{ route('buku.edit', $buku->id) }}">
                    <button> Update </button>
                    </a>

                    <a href="{{ route('galeri.buku', $buku->buku_seo) }}">
                    <button> Detail </button>
                    </a>

                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                        @csrf
                        <button onclick="return confirm('Yakin mau dihapus?')"> Hapus </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>{{ $data_buku -> links("pagination::bootstrap-4") }}</div>
<div><strong> Jumlah Buku: {{ $jumlah_buku }}</strong></div>

<p align="right" style="padding-right:8%"><a href="{{ route('buku.create') }}"> Tambah Buku </a></p>

<h3 style="padding-left:3%">Jumlah data: {{ $no }}</h3>
<h3 style="padding-left:3%">Jumlah data: {{ $buku -> count('id') }}</h3>
<h3 style="padding-left:3%">Jumlah harga: {{ "Rp".number_format($buku->sum('harga')) }}</h3>
@endsection



