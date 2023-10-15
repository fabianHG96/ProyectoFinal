@extends('layouts.seguimiento.productos')
@section('seguimiento.productos')
<div class="container">
    <h1>Seguimiento financiero productos</h1>
    <table>
        @csrf
        <thead>
            <tr>
                <th>Producto</th>
                <th>Total Ventas</th>
                <th>Total Compra</th>
                <th>Mes/semana</th>
                <th>Ganancia</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes generar dinámicamente filas de datos con información de personas -->
            <!-- Ejemplo de una fila de datos (puedes repetir para cada persona) -->
            <tr>
                <td>Producto</td>
                <td>Total Ventas</td>
                <td>Total Compra</td>
                <td>Mes/semana</td>
                <td>Ganancia</td>
            </tr>
            <!-- Fin del ejemplo -->
            @yield('seguimiento.productos')
        </tbody>
    </table>
</div>
@endsection



