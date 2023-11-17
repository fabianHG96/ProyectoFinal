<title>Actualizar Producto</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 4 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 6)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Actualizar Producto</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('UpdateProducto', ['id' => $producto->id]) }}">
        @csrf
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos del Producto</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre del Producto</span>
                    <input type="text" class="form-control" name="Nombre_Producto" id="Nombre_Producto" value="{{ $producto->nombre_producto }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Cantidad Stock</span>
                    <input type="number" class="form-control" name="Cantidad_Stock" id="Cantidad_Stock" value="{{ $producto->cantidad_stock }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Precio Unitario</span>
                    <input type="number" class="form-control" name="Precio_Unitario" id="Precio_Unitario" value="{{ $producto->precio_unitario }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Total</span>
                    <input type="text" class="form-control" name="Total" id="Total" style="background-color: rgb(124, 124, 124);" readonly>
                </div>

            </div>
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
<!-- Agregar el siguiente script JavaScript al final de la vista -->
<script>
    // Función para calcular el total en tiempo real
    function calcularTotal() {
        const cantidad = parseFloat(document.getElementById('Cantidad_Stock').value);
        const precioUnitario = parseFloat(document.getElementById('Precio_Unitario').value);
        const total = cantidad * precioUnitario;
        if (!isNaN(total)) {
            document.getElementById('Total').value = total;
        }
    }

    // Escuchar cambios en los campos de cantidad y precio unitario
    document.getElementById('Cantidad_Stock').addEventListener('input', calcularTotal);
    document.getElementById('Precio_Unitario').addEventListener('input', calcularTotal);

    // Calcular el total inicial
    calcularTotal();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
