<title>Actualizar Bodega</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Actualizar bodega</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="">
        @csrf
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos de la bodega</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Direccion</span>
                    <input type="text" class="form-control" name="direccion" id="direccion">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Capacidad</span>
                    <input type="text" class="form-control" name="capacidad" id="capacidad">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Stock</span>
                    <input type="text" class="form-control" name="stock" id="stock">
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
