@extends('layouts.ordendecompra.create')
@section('ordendecompra.create')

<h1>Crear ordendecompra</h1>
<form action="/guardar_persona" method="POST">
    @csrf <!-- Esto es para protección CSRF en Laravel, asegúrate de incluirlo -->

    <label for="nombres">Nombres:</label>
    <input type="text" id="nombres" name="nombres" required><br>

    <label for="apellido_paterno">Apellido Paterno:</label>
    <input type="text" id="apellido_paterno" name="apellido_paterno" required><br>

    <label for="apellido_materno">Apellido Materno:</label>
    <input type="text" id="apellido_materno" name="apellido_materno" required><br>

    <label for="rut">RUT:</label>
    <input type="text" id="rut" name="rut" required><br>

    <label for="fecha_contratacion">Fecha de Contratación:</label>
    <input type="date" id="fecha_contratacion" name="fecha_contratacion" required><br>

    <label for="salario">Salario:</label>
    <input type="number" id="salario" name="salario" required><br>

    <label for="estado_laboral">Estado Laboral:</label>
    <select id="estado_laboral" name="estado_laboral">
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select><br>

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required><br>

    <label for="inicio">Fecha de Inicio:</label>
    <input type="date" id="inicio" name="inicio" required><br>

    <label for="termino">Fecha de Término:</label>
    <input type="date" id="termino" name="termino" required><br>

    <input type="submit" value="Guardar">
</form>

@endsection
