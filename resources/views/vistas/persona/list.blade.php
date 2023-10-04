@extends('layouts.persona.list')
@section('persona.list')

<div class="container">
    <h1>Listado de personaes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>RUT</th>
                <th>Fecha de Contratación</th>
                <th>Salario</th>
                <th>Estado Laboral</th>
                <th>Dirección</th>
                <th>Inicio</th>
                <th>Término</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes incluir dinámicamente filas de datos de proveedores -->
            <!-- Ejemplo de fila de datos (puedes repetir para cada proveedor) -->
            <tr>
                <td>Nombres</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>RUT</td>
                <td>Fecha de Contratación</td>
                <td>Salario</td>
                <td>Estado Laboral</td>
                <td>Dirección</td>
                <td>Inicio</td>
                <td>Término</td>
            </tr>
            <!-- Fin del ejemplo -->@yield('persona.list')
        </tbody>
    </table>
</div>
@endsection



