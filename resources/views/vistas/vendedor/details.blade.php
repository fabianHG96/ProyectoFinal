<title>Detalles de Vendedor</title>
@extends('layouts.main')
@section('main-content')
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
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombres</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $vendedor->nombre }}" readonly>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Apellido</span>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ $vendedor->apellido }}" readonly>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">RUT</span>
                    <input type="text" class="form-control" name="rut" id="rut" value="{{ $vendedor->rut }}" readonly>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $vendedor->email }}" readonly>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Direccion</span>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $vendedor->direccion }}" readonly>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Telefono</span>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $vendedor->telefono }}" readonly>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Estado Laboral</span>
                    <select id="estado_laboral" name="estado_laboral" class="form-control" disabled>
                        <option value="activo" {{ $vendedor->estado_laboral === 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ $vendedor->estado_laboral === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
            </div>
        </div>

    </form>
</div>
@if($errors->any())
    <div class="alert alert-danger">
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
