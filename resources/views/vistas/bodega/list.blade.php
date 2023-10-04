@extends('layouts.bodega.list')
@section('bodega.list')

<div class="container">
    <h1>Listado de las Bodegas</h1>
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
