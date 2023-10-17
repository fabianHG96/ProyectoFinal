<title>Lista de los Clientes de la Empresa</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Empleados</h1>

        <a class="btn btn-primary align-self-end" href="create">Nuevo Empleado</a>
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
            <th>Acciones</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

