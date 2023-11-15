<title>Nueva Bodega</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 6 )
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Nueva bodega</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="">
        @csrf
        <input type="hidden" name="empresa_id" value="1">
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos de la bodega</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Pais</span>
                    <input type="text" class="form-control" name="pais" id="pais">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Region</span>
                    <input type="text" class="form-control" name="region" id="region">
                </div>
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
            </div>
            <div class="d-flex justify-content-end mt-4">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
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
