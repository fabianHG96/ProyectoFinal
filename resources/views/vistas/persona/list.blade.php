@extends('layouts.gestor.list')
@section('gestor.list')
<div class="container">
    <h1>Listar gestor</h1>
    <table>
        @csrf
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
            <!-- Aquí puedes generar dinámicamente filas de datos con información de gestors -->
            <!-- Ejemplo de una fila de datos (puedes repetir para cada gestor) -->
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
            <!-- Fin del ejemplo -->
            @yield('gestor.list')
        </tbody>
    </table>
