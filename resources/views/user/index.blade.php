@extends('layouts.app')

@section('content')
<secction class="container-xl my-4">
    <h3>Data User</h3>
    <table style="background-color: white;" class="table table-hover mt-3">
        <thead>
            <tr class="table-light">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataUser as $user)
            <tr>
                <td>{{++$no}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->level}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection

