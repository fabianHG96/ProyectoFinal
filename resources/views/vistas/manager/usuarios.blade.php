<title>Lista de Usuarios</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 2 && Auth::user()->cargo_id != 5)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Administar usuarios</h1>

        <a class="btn btn-primary align-self-end" href="{{ route('register') }}">Nuevo usuario</a>
    </div>
</head>





<body>
    <table class="table">
    <thead>
        <tr>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mostraruser as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
