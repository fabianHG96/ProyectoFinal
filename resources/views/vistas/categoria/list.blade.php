<title>Categoria</title>
@extends('layouts.main')
@section('main-content')
<head>
    <div class="col-md-9">
        <div class="">
            <h1 class="align-self-end">Categoria</h1>

            <a class="btn btn-primary align-self-end" href="create">Nueva Categoria</a>
        </div>
    </head>
    <table class="table">
        <thead>
            <tr>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes incluir dinámicamente filas de datos de proveedores -->
            <!-- Ejemplo de fila de datos (puedes repetir para cada proveedor) -->
            <tr>
                <td>Categoria</td>
            </tr>
            <!-- Fin del ejemplo -->
        </tbody>
    </table>
</div>
@endsection
