<title>Crear Empleado</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Nuevo Empleado</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('register.empleado') }}">
        @csrf
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos del Empleado</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombres</span>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Apellido Paterno</span>
                    <input type="text" class="form-control" name="apellido_p" id="apellido_p">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Apellido Materno</span>
                    <input type="text" class="form-control" name="apellido_m" id="apellido_m">
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
                    <span class="input-group-text">Horario</span>
                    <input type="text" class="form-control" name="horario" id="horario">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
