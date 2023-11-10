<title>Detalles de una Empresa</title>
@extends('layouts.main')

@section('main-content')
    <div class="container">
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles de la Empresa</h1>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('ListEmpresa') }}">Volver a la lista</a>
            </div>
            <hr />
        </section>
        <form method="POST" action="{{ route('UpdateEmpresa', $empresa->id) }}">
            @csrf
            <input type="hidden" name="empresa_id" value="1">
            <input type="hidden" name="_method" value="POST">
            <div class="row mt-4">
                <div class="col-md-6">
                    <h2>{{ $empresa->nombre }}</h2>

                    <div class="details">
                        <p><strong>Nombre de la empresa:</strong> {{ $empresa->nombre }}</p>
                        <p><strong>RUT:</strong> {{ $empresa->rut }}</p>
                        <p><strong>Pais:</strong> {{ $empresa->pais }}</p>
                        <p><strong>Region:</strong> {{ $empresa->region }}</p>
                        <p><strong>Direccion:</strong> {{ $empresa->direccion }}</p>
                        <p><strong>Rubro:</strong> {{ $empresa->rubro }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="patent"><strong>Contacto</strong></label>

                    <div class="details">
                        <p><strong>Fecha Fundación:</strong> {{ $empresa->Ffundacion }}</p>
                        <p><strong>Email:</strong> {{ $empresa->email }}</p>
                        <p><strong>Telefono:</strong> {{ $empresa->telefono }}</p>
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
