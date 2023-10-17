<title>Lista de la empresa</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Empresas</h1>

        <a class="btn btn-primary align-self-end" href="create">Nueva Empresa</a>
    </div>
</head>

<body>
    <table class="table">
    <thead>
        <tr>
            <th>Nombre empresa</th>
            <th>RUT empresa</th>
            <th>Pais</th>
            <th>Region</th>
            <th>Rubro</th>
            <th>Fecha de la Fundacion</th>
            <th>email</th>
            <th>telefono</th>
        </tr>
        </thead>
           <tbody>
            @foreach ($mostrarempresa as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->rut }}</td>
                <td>{{ $empresa->pais }}</td>
                <td>{{ $empresa->region }}</td>
                <td>{{ $empresa->rubro }}</td>
                <td>{{ $empresa->Ffundacion }}</td>
                <td>{{ $empresa->email }}</td>
                <td>{{ $empresa->telefono }}</td>
            </tr>
        @endforeach
           </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

