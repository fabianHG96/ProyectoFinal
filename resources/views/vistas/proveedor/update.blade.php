@extends('layouts.proveedor.update')

@section('proveedor.update')
    <div class="container">
        <h1>Actualizar Proveedor</h1>
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
                <label for="numero_contacto">Número de Contacto:</label>
                <input type="text" id="numero_contacto" name="numero_contacto" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" id="correo_electronico" name="correo_electronico" value="" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
