<title>Bodegas</title>
@extends('layouts.main')
@section('main-content')
<head>
    <div class="col-md-9">
        <div class="">
            <h1 class="align-self-end">Bodegas</h1>

            <a class="btn btn-primary align-self-end" href="create">Nueva Bodega</a>
        </div>
    </head>
    <table class="table">
        <thead>
            <tr>
                <th>Direccion</th>
                <th>Capacidad</th>
                <th>Stock</th
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes incluir dinámicamente filas de datos de proveedores -->
            <!-- Ejemplo de fila de datos (puedes repetir para cada proveedor) -->
            <tr>
                <td>Direccion</td>
                <td>Capacidad</td>
                <td>Stock</td>
            </tr>
            <!-- Fin del ejemplo -->
        </tbody>
    </table>
</div>
@endsection
