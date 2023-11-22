<title>Crear Orden de Compra</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
    <h1>Crear orden de compra</h1>
    <form method="POST" action="{{ route('register.Orden') }}">
        @csrf
        <div class="row mt-4">
            <!-- Columna 1: Proveedor -->
            <div class="col-md-6">
                <label for="solicitante"><strong>Datos Solicitante</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre Solicitante</span>
                    <select name="empleado_id" id="empleado_id" class="form-select" required>
                        <option value="">Selecciona un empleado</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Proveedor -->
                <label for="proveedor"><strong>Proveedor</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre Proveedor</span>
                    <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                        <option value="">Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}" data-nombre="{{ $proveedor->nombre }}" data-rut="{{ $proveedor->rut }}" data-direccion="{{ $proveedor->direccion }}" data-telefono="{{ $proveedor->telefono }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mt-2" >

                <input type="hidden" class="form-control" name="nombre_proveedor" id="nombre_proveedor" readonly style="background-color: rgb(124, 124, 124);" required>
                 </div>

                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" readonly style="background-color: rgb(124, 124, 124);" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Rut</span>
                    <input type="text" class="form-control" name="rut" id="rut" readonly style="background-color: rgb(124, 124, 124);" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Dirección</span>
                    <input type="text" class="form-control" name="direccion" id="direccion" readonly style="background-color: rgb(124, 124, 124);" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Teléfono</span>
                    <input type="text" class="form-control" name="telefono" id="telefono" readonly style="background-color: rgb(124, 124, 124);" required>
                </div>
            </div>

            <!-- Columna 2: Vendedor -->
            <div class="col-md-6">
                <label for="fechas"><strong>Fechas de la Solicitud</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Inicio</span>
                    <input type="date" class="form-control" name="fsolicitud" id="fsolicitud" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Término</span>
                    <input type="date" class="form-control" name="ftermino" id="ftermino" required>
                    <div class="input-group mt-2" style="display: none;">
                        <span class="input-group-text">Estado de la orden</span>
                        <select name="estado" id="estado" class="form-select">
                            <option value="en_proceso">En proceso</option>
                            <option value="">Selecciona el estado</option>
                            <option value="aprobado">Aprobado</option>
                            <option value="rechazado">Rechazado</option>
                            <option value="pendiente_revision">Pendiente de revisión</option>
                            <option value="cancelado">Cancelado</option>
                            <option value="completado">Completado</option>
                            <option value="en_espera">En espera</option>
                            <!-- Puedes seguir añadiendo más opciones según tus procesos -->
                        </select>
                    </div>
                </div>

                <!-- Datos Vendedor -->
                <label for="vendedor"><strong>Datos Vendedor</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre Vendedor</span>
                    <select name="vendedor_id" id="vendedor_id" class="form-select" required>
                        <option value="" >Selecciona un vendedor</option>
                        @foreach ($vendedores as $vendedor)
                            <option value="{{ $vendedor->id }}" data-proveedor="{{ $vendedor->proveedor_id }}" data-nombre="{{ $vendedor->nombre }}" data-email="{{ $vendedor->email }}" data-telefono="{{ $vendedor->telefono }}">{{ $vendedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" name="vnombre" id="vnombre" readonly style="background-color: rgb(124, 124, 124);" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" name="vemail" id="vemail" readonly style="background-color: rgb(124, 124, 124);" required>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Teléfono</span>
                    <input type="text" class="form-control" name="tvendedor" id="tvendedor" readonly style="background-color: rgb(124, 124, 124);" required>
                </div>
            </div>

<!-- Detalles orden de compra -->
<div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Monto</th>
                <th scope="col">Total</th>
                <th scope="col"></th> <!-- Columna vacía para espacio -->
                <th scope="col"></th> <!-- Columna vacía para espacio -->
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text">Nombre producto</span>
                            <select name="productos[{{ $i }}][producto_id]" class="form-select producto-select" required>
                                <option value="">Selecciona un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}"
                                            data-nombre_producto="{{ $producto->nombre_producto }}"
                                            data-precio_unitario="{{ $producto->precio_unitario }}"
                                            data-total="{{ $producto->total }}">
                                        {{ $producto->nombre_producto }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" class="form-control nombre-producto" name="productos[{{ $i }}][nombre_producto]" readonly style="background-color: rgb(225, 225, 225);">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text">Cantidad</span>
                            <input type="number" class="form-control cantidad-input" name="productos[{{ $i }}][cantidad]" required>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text">Monto</span>
                            <input type="number" class="form-control monto-input" name="productos[{{ $i }}][monto]" readonly style="background-color: rgb(124, 124, 124);" required>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text">Total</span>
                            <input type="number" class="form-control total-input" name="productos[{{ $i }}][total]" readonly style="background-color: rgb(124, 124, 124);" required>
                        </div>
                    </td>
                    <td></td> <!-- Columna vacía para espacio -->
                    <td></td> <!-- Columna vacía para espacio -->
                </tr>
            @endfor
        </tbody>
    </table>


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
    <script>
       $(document).ready(function () {
    $('#proveedor_id').on('change', function () {
        var proveedorId = $(this).val();
        $('#vendedor_id option').hide();
        $('#vendedor_id option[data-proveedor="' + proveedorId + '"]').show();
        $('#vendedor_id').val(''); // Limpia la selección de vendedor
        $('#proveedor_id').val(proveedorId); // Establece el valor del proveedor_id

            });
        });
        </script>

        <script>
            $(document).ready(function () {
                $('.producto-select').change(function() {
        var selectedOption = $(this).find('option:selected');
        var precio = selectedOption.data('precio_unitario');
        var nombre = selectedOption.data('nombre_producto');
        var row = $(this).closest('tr');

        row.find('.nombre-producto').val(nombre);
        row.find('.monto-input').val(precio);

        calculateTotal(row);
    });

    $('.cantidad-input').change(function() {
        var row = $(this).closest('tr');
        calculateTotal(row);
    });

    function calculateTotal(row) {
        var cantidad = row.find('.cantidad-input').val();
        var monto = row.find('.monto-input').val();
        var total = cantidad * monto;

        row.find('.total-input').val(total);
    }
                });

        </script>
    <script>
            document.getElementById('proveedor_id').addEventListener('change', function () {
            const selectedProveedor = this.options[this.selectedIndex];
            document.getElementById('nombre').value = selectedProveedor.getAttribute('data-nombre');
            document.getElementById('rut').value = selectedProveedor.getAttribute('data-rut');
            document.getElementById('direccion').value = selectedProveedor.getAttribute('data-direccion');
            document.getElementById('telefono').value = selectedProveedor.getAttribute('data-telefono');
            document.getElementById('nombre_proveedor').value = selectedProveedor.getAttribute('data-nombre');
        });
        document.getElementById('vendedor_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('vnombre').value = selectedOption.dataset.nombre;
            document.getElementById('vemail').value = selectedOption.dataset.email;
            document.getElementById('tvendedor').value = selectedOption.dataset.telefono;
        });
        document.getElementById('producto_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        if (selectedOption) {
            document.getElementById('nombre_producto').value = selectedOption.getAttribute('data-nombre_producto');
            document.getElementById('monto').value = selectedOption.getAttribute('data-precio_unitario');
            document.getElementById('total').value = selectedOption.getAttribute('data-total');
            document.getElementById('cantidad').value = selectedOption.getAttribute('data-cantidad_stock');
        } else {
            // Limpiar campos si no se selecciona ningún producto
            document.getElementById('nombre_producto').value = '';
            document.getElementById('monto').value = '';
            document.getElementById('total').value = '';
            document.getElementById('cantidad').value = '';
        }
    });
        </script>


        </html>

    <script src="js/scripts.js"></script>

    @endsection
