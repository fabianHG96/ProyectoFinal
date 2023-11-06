<title>Actualizar un proveedor</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Actualizar un proveedor</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('UpdateProveedor', $proveedor->id) }}">
        @csrf
        <input type="hidden" name="proveedor_id" value="1">
        <input type="hidden" name="_method" value="POST">
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos del Proveedor</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre del Proveedor</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $proveedor->nombre }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">RUT</span>
                    <input type="text" class="form-control" name="rut" id="rut" value="{{ $proveedor->rut }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">País</span>
                    <input type="text" class="form-control" name="pais" id="pais" value="{{ $proveedor->pais }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Región</span>
                    <input type="text" class="form-control" name="region" id="region" value="{{ $proveedor->region }}">
                </div>
            </div>

            <div class="col-md-6">
                <label for="patent"><strong>Datos del trabajo</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Dirección</span>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $proveedor->direccion }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Número de Contacto</span>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $proveedor->telefono }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Correo Electrónico</span>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $proveedor->email }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Rubro</span>
                    <input type="text" class="form-control" name="rubro" id="rubro" value="{{ $proveedor->rubro }}">
                </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <input type="submit" value="Actualizar" class="btn btn-primary">
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
