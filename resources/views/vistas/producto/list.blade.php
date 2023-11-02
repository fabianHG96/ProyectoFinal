<title>Producto</title>
@extends('layouts.main')
@section('main-content')
<head>
    <div class="col-md-9">
        <div class="">
            <h1 class="align-self-end">Producto</h1>

            <a class="btn btn-primary align-self-end" href="create">Nueva Producto</a>
        </div>
    </head>
    <table class="table">
        <thead>
            <tr>
                <th>Cantidad Stock</th>
                <th>Precio Unitario</th>
                <th>Nombre Producto</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes incluir dinámicamente filas de datos de proveedores -->
            <!-- Ejemplo de fila de datos (puedes repetir para cada proveedor) -->
            <tr>
                <td>Cantidad Stock</td>
                <td>Precio Unitario</td>
                <td>Nombre Producto</td>
            </tr>
            <!-- Fin del ejemplo -->
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
