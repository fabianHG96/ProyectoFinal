<title>Actualizar un Vendedor</title>
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
            <h1 class="header">Actualizar un Vendedor</h1>
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
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $vendedor->nombre }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Apellido</span>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ $vendedor->apellido }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">RUT</span>
                    <input type="text" class="form-control" name="rut" id="rut" value="{{ $vendedor->rut }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $vendedor->email }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Direccion</span>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $vendedor->direccion }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Telefono</span>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $vendedor->telefono }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Estado Laboral</span>
                    <select id="estado_laboral" name="estado_laboral" class="form-control">
                        <option value="activo" {{ $vendedor->estado_laboral === 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ $vendedor->estado_laboral === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
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
