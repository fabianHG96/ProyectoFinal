@extends('layouts.proveedor.list')
@section('proveedor.list')

<div class="container">
    <h1>Listado de Proveedores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>RUT</th>
                <th>Dirección</th>
                <th>Número de Contacto</th>
                <th>Correo Electrónico</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes incluir dinámicamente filas de datos de proveedores -->
            <!-- Ejemplo de fila de datos (puedes repetir para cada proveedor) -->
            <tr>
                <td>Nombre Proveedor</td>
                <td>Apellido Paterno Proveedor</td>
                <td>Apellido Materno Proveedor</td>
                <td>RUT Proveedor</td>
                <td>Dirección Proveedor</td>
                <td>Número de Contacto Proveedor</td>
                <td>Correo Electrónico Proveedor</td>
            </tr>
            <!-- Fin del ejemplo -->
        </tbody>
    </table>
</div>
@endsection
