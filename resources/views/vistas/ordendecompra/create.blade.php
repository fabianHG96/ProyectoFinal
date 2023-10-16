<title>Crear Orden de Compra</title>
@extends('layouts.main')
@section('main-content')

<h1>Crear orden de compra</h1>
<form action="/guardar_persona" method="POST">
    @csrf
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="names"><strong>fecha de la Solicitud</strong></label>
            <div class="input-group mt-2">
                <span class="input-group-text">Fecha de Inicio</span>
                <input type="date" class="form-control" name="Fsolicitud" id="Fsolicitud">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Detalles del item</span>
                <input type="text" class="form-control" name="detalles" id="detalles">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Estado</span>
                <input type="text" class="form-control" name="estado" id="estado">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Total</span>
                <input type="number" class="form-control" name="total" id="total">
            </div>
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
