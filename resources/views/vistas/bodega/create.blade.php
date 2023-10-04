@extends('layouts.bodega.create')
@section('bodega.create')
<div class="container">
<h1>Crear proveedor</h1>
<form action="/guardar_proveedor" method="POST">
    @csrf <!-- Esto es para protección CSRF en Laravel, asegúrate de incluirlo -->

    <label for="Direccion">Direccion:</label>
    <input type="text" id="Direccion" name="Direccion" required><br>

    <label for="Capacidad">Capacidad:</label>
    <input type="text" id="Capacidad" name="Capacidad" required><br>

    <label for="Stock">Stock:</label>
    <input type="text" id="Stock" name="Stock" required><br>
</form>

        <input type="submit" value="Guardar">
    </form>
</div>

@endsection
