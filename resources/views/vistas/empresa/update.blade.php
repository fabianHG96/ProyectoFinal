<title>Actualizar una Empresa</title>
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
            <h1 class="header">Actualizar una Empresa</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('UpdateEmpresa', $empresa->id) }}">
        @csrf
        <input type="hidden" name="empresa_id" value="1">
        <input type="hidden" name="_method" value="POST">
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos del Empresa</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre de la empresa</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $empresa->nombre }}">
                </div>
                <div class="input-group mt-2">
                    <input  type="hidden" class="form-control" name="rut" id="rut" value="{{ $empresa->rut }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Pais</span>
                    <input type="text" class="form-control" name="pais" id="pais" value="{{ $empresa->pais }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Region</span>
                    <input type="text" class="form-control" name="region" id="region" value="{{ $empresa->region }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Direccion</span>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $empresa->direccion }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Rubro</span>
                    <input type="text" class="form-control" name="rubro" id="rubro" value="{{ $empresa->rubro }}">
                </div>
            </div>
            <div class="col-md-6">
                <label for="patent"><strong>Contacto</strong></label>
                <div class="input-group mt-2">
                    <input  type="hidden" class="form-control" name="Ffundacion" id="Ffundacion" value="{{ $empresa->Ffundacion }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">email</span>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $empresa->email }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Telefono</span>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $empresa->telefono }}">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <input type="submit" value="Actualizar" class="btn btn-primary">
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
