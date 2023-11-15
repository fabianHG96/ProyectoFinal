<title>Detalles del Vendedor</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 5)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles del Vendedor</h1>
            </div>
            <hr />
        </section>
        <form method="POST" action="{{ route('UpdateVendedor', ['id' => $vendedor->id]) }}">
            @csrf
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="names"><strong>Datos del Vendedor</strong></label>

                    <div class="details">
                        <p><strong>Nombres:</strong> {{ $vendedor->nombre }}</p>
                        <p><strong>Apellido:</strong> {{ $vendedor->apellido }}</p>
                        <p><strong>RUT:</strong> {{ $vendedor->rut }}</p>
                        <p><strong>Email:</strong> {{ $vendedor->email }}</p>
                        <p><strong>Dirección:</strong> {{ $vendedor->direccion }}</p>
                        <p><strong>Telefono:</strong> {{ $vendedor->telefono }}</p>
                        <p><strong>Estado Laboral:</strong> {{ ucfirst($vendedor->estado_laboral) }}</p>
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
