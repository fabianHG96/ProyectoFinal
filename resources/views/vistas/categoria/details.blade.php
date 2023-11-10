<title>Detalles de la Categoria</title>
@extends('layouts.main')
@section('main-content')
    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles de la Categoria</h1>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('ListCategoria') }}">Volver a la lista</a>
            </div>
            <hr />
        </section>

        <div class="">
            <div class="card-body">
                <h2>{{ $categoria->categoria }}</h2>
                <p>Creado el: {{ $categoria->created_at->format('d/m/Y H:i:s') }}</p>
                <p>Última actualización: {{ $categoria->updated_at->format('d/m/Y H:i:s') }}</p>

                <div class="details">
                    <div class="detalle-label">Categoría:</div>
                    <div class="detalle-value">{{ $categoria->categoria }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
