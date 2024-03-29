<title>Seguimiento De Productos</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 4 && Auth::user()->cargo_id != 5)
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
        <h1 class="align-self-end">Seguimiento De Productos</h1>

        <a class="btn btn-primary align-self-end" href="create">Nuevo Seguimiento De Productos</a>
    </div>
</head>

<body>
    <table class="table">
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
            @yield('main-content')
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
