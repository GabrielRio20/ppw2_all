{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<div class="container">
    <h4>Update Galeri</h4>

    <div class="mr-5 ml-5">
    <form method="post" action="{{ route('galeri.update', $galeri->id) }}">
    @csrf
        <div>Nama <input type="text" name="nama" value="{{$galeri->nama_galeri}}"></div>
        <div>Judul <input type="text" name="judul" value="{{$galeri->albums->judul}}"></div>
        <div>Gambar  <input type="text" name="foto" value="{{$galeri->foto}}"></div>

        <div><button type="submit">Simpan</button>
        <a href="/galeri">Batal</a></div>
    </form>
  </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
    <title>Document</title>
</head>
<body style="margin:5%">
    <form action="{{ route('galeri.update', $galeri->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama_galeri">Judul</label>
            <input type="text" name="nama_galeri" class="form-control" value="{{$galeri->nama_galeri}}">
        </div>
        <div class="form-group">
            <label for="id_buku">Buku</label>
            <select name="id_buku" class="form-control" {{$galeri->id_buku}}>
                <option value="" selected> Pilih Buku </option>
                @foreach ($buku as $data)
                <option value="{{ $data->id }}"{{ $data->id == $galeri->id_buku? 'selected':'' }}>{{ $data->judul }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="keterangan"> Keterangan</label>
                <textarea name="keterangan" class="form-control"> {{$galeri->keterangan}} </textarea >
            </div>

            <div class="form-group">
                <label for="foto"> Upload Foto</label>
                <input type="file" class="form-control" name="foto" value="{{ $galeri->foto }}">
            </div>

            <div class="form-group mt-5">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="/galeri" class="btn btn warning">Cancel</a>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>