<title>Lista Vendedores</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Vendedores</h1>

        <a class="btn btn-primary align-self-end" href="create">Nuevo Vendedores</a>
    </div>
</head>

<body>
    <table class="table">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>RUT</th>
            <th>direccion</th>
            <th>Correo</th>
            <th>telefono</th>
            <th>Estado laboral</th>
        </tr>
        </thead>
        <tbody>
            @foreach($mostrarvendedor->sortBy('id') as $vendedor)
            <tr>
               <td>{{ $vendedor->nombre }}</td>
               <td>{{ $vendedor->apellido }}</td>
               <td>{{ $vendedor->rut }}</td>
               <td>{{ $vendedor->direccion }}</td>
               <td>{{ $vendedor->email }}</td>
               <td>{{ $vendedor->telefono }}</td>
               <td>{{ $vendedor->estado_laboral }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

