<title>Crear Orden de Compra</title>
@extends('layouts.main')
@section('main-content')
    <h1>Crear orden de compra</h1>
    <form method="POST" action="{{ route('register.Orden') }}">
        @csrf
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>fecha de la Solicitud</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Inicio</span>
                    <input type="date" class="form-control" name="fsolicitud" id="fsolicitud">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Termino</span>
                    <input type="date" class="form-control" name="ftermino" id="ftermino">
                </div>

                <!-- Columna 2: Proveedor -->
                <div class="col-md-6">
                    <label for="patente"><strong>Datos Proveedor</strong></label>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Nombre</span>
                        <select name="proveedor_id" id="proveedor_id">
                            <option value="">Selecciona un proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Rut</span>
                        <input type="text" class="form-control" name="rproveedor" id="rproveedor">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Direccion</span>
                        <input type="text" class="form-control" name="dproveedor" id="dproveedor">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Telefono</span>
                        <input type="text" class="form-control" name="tproveedor" id="tproveedor">
                    </div>
                </div>

                <!-- Columna 2: Vendedor -->
                <div class="col-md-6">
                    <label for="patente"><strong>Datos Vendedor</strong></label>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Nombre Vendedor</span>
                        <select name="vendedor_id" id="vendedor_id">
                            <option value="">Selecciona un vendedor</option>
                            @foreach ($vendedores as $vendedor)
                                <option value="{{ $vendedor->id }}" data-proveedor="{{ $vendedor->proveedor_id }}">{{ $vendedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Email</span>
                        <input type="text" class="form-control" name="vemail" id="vemail">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Telefono</span>
                        <input type="text" class="form-control" name="tvendedor" id="tvendedor">
                    </div>
                </div>

            </div>
        </div>
        <!-- Columna 2: Detalles orden de compra -->
        <div class="col-md-6">
            <label for="patente"><strong>Detalles</strong></label>
            <div class="input-group mt-2">
                <span class="input-group-text">Nombre producto</span>
                <input type="text" class="form-control" name="nitem" id="nitem">
                        <!-- debe ser un select -->
                <span class="input-group-text">Estado</span>
                <input type="text" class="form-control" name="estado" id="estado">

                <span class="input-group-text">cantidad</span>
                <input type="int" class="form-control" name="cantidad" id="cantidad">
                <span class="input-group-text">monto</span>
                <input type="int" class="form-control" name="monto" id="monto">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Total</span>
                <input type="int" class="form-control" name="total" id="total">
            </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
    </form>

    </div>
    @if ($errors->any())
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
