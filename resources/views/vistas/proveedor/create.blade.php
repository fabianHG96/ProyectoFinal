<title>Crear un proveedor</title>
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
            <h1 class="header">Crear un proveedor</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('register.proveedor') }}">
        @csrf
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos del Proveedor</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre del Proveedor</span>
                    <input required type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">RUT</span>
                    <input required type="text" class="form-control" name="rut" id="rut">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Pais</span>
                    <input required type="text" class="form-control" name="pais" id="pais">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Region</span>
                    <input required type="text" class="form-control" name="region" id="region">
                </div>
            </div>

            <div class="col-md-6">
                <label for="patent"><strong>Datos del trabajo</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Dirección</span>
                    <input required type="text" class="form-control" name="direccion" id="direccion" >
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Telefono</span>
                    <input required type="text" class="form-control" name="telefono" id="telefono" >
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Correo Electrónico</span>
                    <input required type="text" class="form-control" name="email" id="email">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Rubro</span>
                    <input required type="text" class="form-control" name="rubro" id="rubro">
                </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <input type="submit" value="Guardar" class="btn btn-primary">
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
