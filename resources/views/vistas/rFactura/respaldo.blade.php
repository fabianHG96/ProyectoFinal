<title>Lista Respaldos Facturas</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Respaldos Facturas</h1>

        <a class="btn btn-primary align-self-end" href="create">Nuevo Respaldos Facturas</a>
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
            <form action="{{ route('subirFactura') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="archivo_pdf">
                <button type="submit">Subir PDF</button>
            </form>

            <!-- Fin del ejemplo -->
            @yield('main-content')
        </tbody>
    </table>
</div>
@endsection



