<title>Actualizar Orden de Compra</title>
@extends('layouts.main')
@section('main-content')

<h1>Actualizar ordendecompra</h1>
<form action="/guardar_persona" method="POST">
    @csrf
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="names"><strong>Datos del cliente</strong></label>
            <div class="input-group mt-2">
                <span class="input-group-text">Nombres</span>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Apellido Paterno</span>
                <input type="text" class="form-control" name="surname" id="surname">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Apellido Materno</span>
                <input type="text" class="form-control" name="lastname" id="lastname">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">RUT</span>
                <input type="text" class="form-control" name="rut" id="rut">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Email</span>
                <input type="text" class="form-control" name="email" id="email" >
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Direccion</span>
                <input type="text" class="form-control" name="direccion" id="direccion" >
            </div>
        </div>

        <div class="col-md-6">
            <label for="patent"><strong>Datos del trabajo</strong></label>
            <div class="input-group mt-2">
                <span class="input-group-text">Fecha de contratacion</span>
                <input type="date" class="form-control" name="Fcontratacion" id="Fcontratacion">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Cargo</span>
                <input type="text" class="form-control" name="cargo" id="cargo">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Salario</span>
                <input type="text" class="form-control" name="salario" id="salario">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Estado Laboral</span>
            <select id="estado_laboral" name="estado_laboral" class="form-control">
                <option value="activo">Activo</option>slot
                <option value="inactivo">Inactivo</option>slot
                </select>
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Fecha de Inicio</span>
                <input type="date" class="form-control" name="Finicio" id="Finicio">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Fecha de Finalizacion</span>
                <input type="date" class="form-control" name="Ftermino" id="Ftermino">
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
@endsection
