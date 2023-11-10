<title>Detalles del Cliente de la Empresa</title>
@extends('layouts.main')
@section('main-content')
    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles de un Cliente de la empresa</h1>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('ListClienteEmpresa') }}">Volver a la lista</a>
            </div>
            <hr />
        </section>

        <form method="POST" action="{{ route('UpdateClienteEmpresa', ['id' => $clienteEmpresa->id]) }}">
            @csrf
            <div class="row mt-4">
                <div class="col-md-6">
                    <h2>{{ $clienteEmpresa->nombre }}</h2>
                    <p>Creado el: {{ $clienteEmpresa->created_at->format('d/m/Y H:i:s') }}</p>
                    <p>Última actualización: {{ $clienteEmpresa->updated_at->format('d/m/Y H:i:s') }}</p>

                    <div class="details">
                        <p><strong>Nombre de la empresa:</strong> {{ $clienteEmpresa->nombre }}</p>
                        <p><strong>RUT:</strong> {{ $clienteEmpresa->rut }}</p>
                        <p><strong>País:</strong> {{ $clienteEmpresa->pais }}</p>
                        <p><strong>Región:</strong> {{ $clienteEmpresa->region }}</p>
                        <p><strong>Dirección:</strong> {{ $clienteEmpresa->direccion }}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="patent"><strong>Contacto</strong></label>
                    <div class="details">
                        <p><strong>Email:</strong> {{ $clienteEmpresa->email }}</p>
                        <p><strong>Teléfono:</strong> {{ $clienteEmpresa->telefono }}</p>
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
