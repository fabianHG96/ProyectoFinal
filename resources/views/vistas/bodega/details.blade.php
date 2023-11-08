<title>Detalles de la bodega</title>
@extends('layouts.main')
@section('main-content')
    <div class="container">
        <body>
            <!-- Encabezado, menú u otras secciones -->

            <div class="container">
                <section>
                    <div class="header-and-button d-flex justify-content-between align-items-center">
                        <h1 class="header">Detalles de la bodega</h1>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('ListBodega') }}">Volver a la lista</a>
                    </div>
                    <hr />
                </section>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="names"><strong>Detalles de la bodega</strong></label>
                        <div class="input-group mt-2">
                            <span class="input-group-text">País</span>
                            <input type="text" class="form-control" name="pais" id="pais" value="{{ $bodega->pais }}" readonly>
                        </div>
                        <div class="input-group mt-2">
                            <span class="input-group-text">Región</span>
                            <input type="text" class="form-control" name="region" id="region" value="{{ $bodega->region }}" readonly>
                        </div>
                        <div class="input-group mt-2">
                            <span class="input-group-text">Dirección</span>
                            <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $bodega->direccion }}" readonly>
                        </div>
                        <div class="input-group mt-2">
                            <span class="input-group-text">Capacidad</span>
                            <input type="text" class="form-control" name="capacidad" id="capacidad" value="{{ $bodega->capacidad }}" readonly>
                        </div>
                        <div class="input-group mt-2">
                            <span class="input-group-text">Stock</span>
                            <input type="text" class="form-control" name="stock" id="stock" value="{{ $bodega->stock }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </body>

    </div>
@endsection
