<title>Detalles del proveedor</title>
@extends('layouts.main')

@section('main-content')
    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles de la Proveedor</h1>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('ListProveedor') }}">Volver a la lista</a>
            </div>
            <hr />
        </section>
        <form method="POST" action="{{ route('DetailsProveedor', $proveedor->id) }}">
            @csrf
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="names"><strong>Datos del Proveedor</strong></label>

                    <div class="details">
                        <p><strong>Nombre del Proveedor:</strong> {{ $proveedor->nombre }}</p>
                        <p><strong>RUT:</strong> {{ $proveedor->rut }}</p>
                        <p><strong>País:</strong> {{ $proveedor->pais }}</p>
                        <p><strong>Región:</strong> {{ $proveedor->region }}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="patent"><strong>Datos del Trabajo</strong></label>

                    <div class="details">
                        <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
                        <p><strong>Número de Contacto:</strong> {{ $proveedor->telefono }}</p>
                        <p><strong>Correo Electrónico:</strong> {{ $proveedor->email }}</p>
                        <p><strong>Rubro:</strong> {{ $proveedor->rubro }}</p>
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
