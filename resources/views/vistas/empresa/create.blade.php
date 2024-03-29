<title>Crear Empresa</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 2 && Auth::user()->cargo_id != 5 )
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Nueva Empresa</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('register.Empresa') }}">
        @csrf
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos de la Empresa</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre de la empresa</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">RUT</span>
                    <input type="text" class="form-control" name="rut" id="rut" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Pais</span>
                    <input type="text" class="form-control" name="pais" id="pais" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Region</span>
                    <input type="text" class="form-control" name="region" id="region" required >
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Direccion</span>
                    <input type="text" class="form-control" name="direccion" id="direccion"required >
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Rubro</span>
                    <input type="text" class="form-control" name="rubro" id="rubro" required>
                </div>
            </div>

            <div class="col-md-6">
                <label for="patent"><strong>Contacto</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de la Fundacion</span>
                    <input type="date" class="form-control" name="Ffundacion" id="Ffundacion" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">email</span>
                    <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Telefono</span>
                    <input type="text" class="form-control" name="telefono" id="telefono" required>
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
