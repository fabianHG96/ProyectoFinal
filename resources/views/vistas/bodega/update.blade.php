@extends('layouts.bodega.create')
@section('bodega.create')
<div class="container">
    <h1>Actualizar bodega</h1>
    <form action="#" method="POST">
        @csrf
        <div class="form-group">
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="" class="form-control">
        </div>


            </form>
        <!-- Botón de Actualización -->
        <input type="submit" value="Actualizar">
    </form>
</div>

@endsection
