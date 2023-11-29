<title>Detalles de la orden de compra</title>
@extends('layouts.main')

@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif

    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles de la Orden de Compra</h1>
            </div>
            @if (!session('pdf'))
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('ListOrdenDeCompra') }}">Volver a la lista</a>
            </div>
        @endif
            <hr />
        </section>
        <form method="POST" action="{{ route('UpdateOrdenDeCompra', ['id' => $ordendecompra->id]) }}">
            @csrf
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Orden de compra N° {{ $ordendecompra->id }}</h2>

                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Proveedor:</th>
                                    <td>{{ $ordendecompra->proveedor->nombre }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">RUT:</th>
                                    <td>{{ $ordendecompra->proveedor->rut }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Dirección del Proveedor:</th>
                                    <td>{{ $ordendecompra->proveedor->direccion }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Teléfono del Proveedor:</th>
                                    <td>{{ $ordendecompra->proveedor->telefono }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <!-- Fecha de Solicitud and Datos del Vendedor Section -->
                        <div class="col-md-6">
                            <h4>Fechas</h4>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Fecha de Solicitud:</th>
                                        <td>{{ $ordendecompra->fecha_solicitud }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fecha de Término:</th>
                                        <td>{{ $ordendecompra->fecha_termino }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Estado de la Orden:</th>
                                        <td>{{ ucfirst(str_replace('_', ' ', $ordendecompra->estado)) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                            <div class="col-md-6">
                            <h4>Datos del Vendedor</h4>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nombre del Vendedor:</th>
                                        <td>{{ $ordendecompra->vendedor->nombre }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email del Vendedor:</th>
                                        <td>{{ $ordendecompra->vendedor->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Teléfono del Vendedor:</th>
                                        <td>{{ $ordendecompra->vendedor->telefono }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <H4>Detalle de productos</H4>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre del Producto</th>
                                    <th>Cantidad</th>
                                    <th>$Monto</th>
                                    <th>$Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordendecompra->productos as $producto)
                                    <tr>
                                        <td>{{ $producto->pivot->nombre_producto }}</td>
                                        <td>{{ $producto->pivot->cantidad }}</td>
                                        <td>{{ number_format($producto->pivot->monto, 0, '.', ',') }}</td>
                                        <td>{{ number_format($producto->pivot->total, 0, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </form>
        <a href="{{ route('DescargarOrdenDeCompra', ['id' => $ordendecompra->id]) }}" class="btn btn-primary">Descargar</a>

    </div>

    @if($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
@endsection
