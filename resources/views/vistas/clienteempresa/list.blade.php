<title>Lista de los Clientes de la Empresa</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 2 )
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
        <h1 class="align-self-end">Cliente Empresa</h1>

        <a class="btn btn-primary align-self-end" href="create">Nuevo Cliente Empresa</a>
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
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach($mostrarcliente_empresas->sortBy('id') as $cliente_empresa)
            <tr>
                <td>{{ $cliente_empresa->nombre }}</td>
                <td>{{ $cliente_empresa->rut }}</td>
                <td>{{ $cliente_empresa->pais }}</td>
                <td>{{ $cliente_empresa->region }}</td>
                <td>{{ $cliente_empresa->direccion }}</td>
                <td>{{ $cliente_empresa->telefono }}</td>
                <td>{{ $cliente_empresa->email }}</td>
                <td>
                    <form action="{{ route('eliminarClienteEmpresa', $cliente_empresa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('ShowUpdateClienteEmpresa', $cliente_empresa->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
                </td>
                <td>
                    <a href="{{ route('DetailsClienteEmpresa', $cliente_empresa->id) }}" class="btn btn-primary btn-sm">Detalles</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
