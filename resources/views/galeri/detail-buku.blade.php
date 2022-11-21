<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <section id="album" class="py-1 text-center bg-light">
        <div class="container">
            <h2> Buku: {{ $buku->judul }} </h2>
            <hr>
            <div class="row">
                @foreach ($galeri as $data)
                <div class="col-md-4">
    
                    <a href="{{ asset('images/'.$data->foto) }}" data-lightbox = "image-1" data-title="{{ $data->keterangan }}"> <img src="{{ asset('images/'.$data->foto) }}" style="width: 200px; height: 150px"></a>
    
                    <p><h5>{{ $data->nama_galeri }}</h5></p>
    
                </div>
                @endforeach
            </div>
            <div>{{ $galeri->links() }}</div>
        </div>
    </section>
    <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>