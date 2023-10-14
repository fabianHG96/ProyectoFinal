@extends('layouts.persona.create')

@section('persona.create')
    <div class="container">
        <h1>Crear nuevo empleado</h1>
        <form >
            @csrf

            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" id="apellido_materno" name="apellido_materno" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" id="rut" name="rut" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="fecha_contratacioin">fecha contratacioin:</label>
                <input type="date" id="fecha_contratacion" name="fecha_contratacion" required="" class="form-control">
            </div>
            <div class="form-group">
                <label for="salario">Cargo:</label>
                <input type="text" id="salario" name="salario" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="text" id="salario" name="salario" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="estadolaboral">Estado laboral:</label>
                <select id="estado_laboral" name="estado_laboral" class="form-control">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">fecha Inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required="" class="form-control">
            </div>
            <div class="form-group">
                <label for="fecha_terminio">fecha terminio:</label>
                <input type="date" id="fecha_terminio" name="fecha_terminio" required="" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
