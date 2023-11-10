<title>Detalles de la orden de compra</title>
@extends('layouts.main')

@section('main-content')
    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles de la Orden de Compra</h1>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('ListOrdenDeCompra') }}">Volver a la lista</a>
            </div>
            <hr />
        </section>
        <form method="POST" action="{{ route('UpdateOrdenDeCompra', ['id' => $ordendecompra->id]) }}">
            @csrf
            <div class="row mt-4">
                <div class="col-md-6">
                    <h2>{{ $ordendecompra->proveedor->nombre }}</h2>

                    <div class="details">
                        <p><strong>Proveedor:</strong> {{ $ordendecompra->proveedor->nombre }}</p>
                        <p><strong>RUT del Proveedor:</strong> {{ $ordendecompra->proveedor->rut }}</p>
                        <p><strong>Dirección del Proveedor:</strong> {{ $ordendecompra->proveedor->direccion }}</p>
                        <p><strong>Teléfono del Proveedor:</strong> {{ $ordendecompra->proveedor->telefono }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="patent"><strong>Fecha de Solicitud</strong></label>

                    <div class="details">
                        <p><strong>Fecha de Solicitud:</strong> {{ $ordendecompra->fecha_solicitud }}</p>
                        <p><strong>Fecha de Término:</strong> {{ $ordendecompra->fecha_termino }}</p>
                        <p><strong>Estado de la Orden:</strong> {{ ucfirst(str_replace('_', ' ', $ordendecompra->estado)) }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="vendedor"><strong>Datos del Vendedor</strong></label>

                    <div class="details">
                        <p><strong>Nombre del Vendedor:</strong> {{ $ordendecompra->vendedor->nombre }}</p>
                        <p><strong>Email del Vendedor:</strong> {{ $ordendecompra->vendedor->email }}</p>
                        <p><strong>Teléfono del Vendedor:</strong> {{ $ordendecompra->vendedor->telefono }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="producto"><strong>Detalles del Producto</strong></label>

                    <div class="details">
                        <p><strong>Nombre del Producto:</strong> {{ $ordendecompra->nombre_producto }}</p>
                        <p><strong>Cantidad:</strong> {{ $ordendecompra->cantidad }}</p>
                        <p><strong>Monto:</strong> {{ $ordendecompra->monto }}</p>
                        <p><strong>Total:</strong> {{ $ordendecompra->total }}</p>
                    </div>
                </div>
            </div>
        </form>
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
