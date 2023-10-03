@extends('layouts.persona.create')
@section('persona.create')
<div class="container">
    <h1>Actualizar Persona</h1>
    <form action="#" method="POST">
        @csrf
        <!-- Nombres -->
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required>

        <!-- Apellido Paterno -->
        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" required>

        <!-- Apellido Materno -->
        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" id="apellido_materno" name="apellido_materno" required>

        <!-- RUT -->
        <label for="rut">RUT:</label>
        <input type="text" id="rut" name="rut" required>

        <!-- Fecha de Contratación -->
        <label for="fecha_contratacion">Fecha de Contratación:</label>
        <input type="date" id="fecha_contratacion" name="fecha_contratacion" required>

        <!-- Salario -->
        <label for="salario">Salario:</label>
        <input type="number" id="salario" name="salario" required>

        <!-- Estado Laboral -->
        <label for="estado_laboral">Estado Laboral:</label>
        <select id="estado_laboral" name="estado_laboral">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>

        <!-- Dirección -->
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <!-- Fecha de Inicio -->
        <label for="inicio">Fecha de Inicio:</label>
        <input type="date" id="inicio" name="inicio" required>

        <!-- Fecha de Término -->
        <label for="termino">Fecha de Término:</label>
        <input type="date" id="termino" name="termino" required>

        <!-- Botón de Actualización -->
        <input type="submit" value="Actualizar">
    </form>
</div>

@endsection
