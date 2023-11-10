<title>Detalles de la bodega</title>
@extends('layouts.main')
@section('main-content')
    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles de la bodega</h1>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('ListBodega') }}">Volver a la lista</a>
            </div>
            <hr />
        </section>

        <div class="row mt-4">
            <div class="col-md-6">
                <h2>{{ $bodega->nombre_bodega }}</h2>
                <p>Creado el: {{ $bodega->created_at->format('d/m/Y H:i:s') }}</p>
                <p>Última actualización: {{ $bodega->updated_at->format('d/m/Y H:i:s') }}</p>

                <div class="details">
                    <p>País: {{ $bodega->pais }}</p>
                    <p>Región: {{ $bodega->region }}</p>
                    <p>Dirección: {{ $bodega->direccion }}</p>
                    <p>Capacidad: {{ $bodega->capacidad }}</p>
                    <p>Stock: {{ $bodega->stock }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
