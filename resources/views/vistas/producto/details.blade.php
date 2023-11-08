<title>Detalles del Producto</title>
@extends('layouts.main')

@section('main-content')
    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <!-- Verifica si no estás generando un PDF para mostrar el navbar y los botones -->
                @if (!request()->is('producto/descargar-producto/*'))
                    <h1 class="header">Detalles del Producto</h1>
                @endif
            </div>
            <hr />
        </section>

        <div class="row mt-4">
            <div class="col-md-6">
                <h2>{{ $producto->nombre_producto }}</h2>
                <p>Creado el: {{ $producto->created_at->format('d/m/Y H:i:s') }}</p>
                <p>Última actualización: {{ $producto->updated_at->format('d/m/Y H:i:s') }}</p>

                <div class="details">
                    <p>Categoría: {{ $producto->categoria->categoria }}</p>
                    <p>Bodega: {{ $producto->bodega->direccion }}</p>
                    <p>Cantidad en Stock: {{ $producto->cantidad_stock }}</p>
                    <p>Precio Unitario: ${{ number_format($producto->precio_unitario, 2) }}</p>
                    <p>Total: ${{ number_format($producto->total, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('ListProductos') }}" class="btn btn-primary">Volver</a>
            <form method="post" action="{{ route('DescargarProductoDetalles', ['id' => $producto->id]) }}">
                @csrf
                <button type="submit" class="btn btn-success">Descargar Detalles</button>
            </form>
        </div>
    </div>
@endsection
