<title>Producto</title>
@extends('layouts.main')
@section('main-content')
<head>
    <div class="col-md-9">
        <div class="">
            <h1 class="align-self-end">Producto</h1>

            <a class="btn btn-primary align-self-end" href="create">Nuevo Producto</a>
        </div>
    </head>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre Producto</th>
                <th>Cantidad Stock</th>
                <th>Precio Unitario</th>
                <th>total</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($mostrarproducto->sortBy('id') as $producto)
            <tr>
                <td>{{ $producto->nombre_producto }}</td>
                <td>{{ $producto->cantidad_stock}}</td>
                <td>{{ $producto->precio_unitario}}</td>
                <td>{{ $producto->cantidad_stock * $producto->precio_unitario }}</td> <!-- Cálculo del Total -->
                <td>
                    <form action="{{ route('EliminarProducto', $producto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('ShowUpdateProducto', $producto->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
                </td>
                <td>
                    <a href="{{ route('ProductoDetails', $producto->id) }}" class="btn btn-primary btn-sm">Detalles</a>
                </td>
                <td>
                    <form method="post" action="{{ route('DescargarProductoDetalles', ['id' => $producto->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Descargar Detalles</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
