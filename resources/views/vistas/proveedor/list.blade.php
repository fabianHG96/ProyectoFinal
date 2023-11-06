<title>Proveedores</title>
@extends('layouts.main')
@section('main-content')

<head>
    <div class="col-md-9">
        <div class="">
            <h1 class="align-self-end">Listado de Proveedores</h1>

            <a class="btn btn-primary align-self-end" href="create">Nuevo Proveedor</a>
        </div>
    </head>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Nombre Proveedor</th>
                <th>Rut</th>
                <th>Pais</th>
                <th>Region</th>
                <th>Dirección</th>
                <th>telefono</th>
                <th>Correo Electrónico</th>
                <th>Rubro</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($mostrarproveedor as $proveedor)
            <tr>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->rut }}</td>
                <td>{{ $proveedor->pais }}</td>
                <td>{{ $proveedor->region }}</td>
                <td>{{ $proveedor->direccion }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->email }}</td>
                <td>{{ $proveedor->rubro }}</td>
                <td>
                    <form action="{{ route('eliminarProveedor', $proveedor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('showUpdateProveedor', $proveedor->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
