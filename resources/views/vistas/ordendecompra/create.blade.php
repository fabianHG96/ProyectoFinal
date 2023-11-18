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



@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
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
                    <select name="empleado_id" id="empleado_id" class="form-select">
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
                    <select name="proveedor_id" id="proveedor_id" class="form-select">
                        <option value="">Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}" data-nombre="{{ $proveedor->nombre }}" data-rut="{{ $proveedor->rut }}" data-direccion="{{ $proveedor->direccion }}" data-telefono="{{ $proveedor->telefono }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" readonly style="background-color: rgb(124, 124, 124);">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Rut</span>
                    <input type="text" class="form-control" name="rut" id="rut" readonly style="background-color: rgb(124, 124, 124);">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Dirección</span>
                    <input type="text" class="form-control" name="direccion" id="direccion" readonly style="background-color: rgb(124, 124, 124);">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Teléfono</span>
                    <input type="text" class="form-control" name="telefono" id="telefono" readonly style="background-color: rgb(124, 124, 124);">
                </div>
            </div>

            <!-- Columna 2: Vendedor -->
            <div class="col-md-6">
                <label for="fechas"><strong>Fechas de la Solicitud</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Inicio</span>
                    <input type="date" class="form-control" name="fsolicitud" id="fsolicitud">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Término</span>
                    <input type="date" class="form-control" name="ftermino" id="ftermino">
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
                    <select name="vendedor_id" id="vendedor_id" class="form-select">
                        <option value="">Selecciona un vendedor</option>
                        @foreach ($vendedores as $vendedor)
                            <option value="{{ $vendedor->id }}" data-proveedor="{{ $vendedor->proveedor_id }}" data-nombre="{{ $vendedor->nombre }}" data-email="{{ $vendedor->email }}" data-telefono="{{ $vendedor->telefono }}">{{ $vendedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" name="vnombre" id="vnombre" readonly style="background-color: rgb(124, 124, 124);">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" name="vemail" id="vemail" readonly style="background-color: rgb(124, 124, 124);">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Teléfono</span>
                    <input type="text" class="form-control" name="tvendedor" id="tvendedor" readonly style="background-color: rgb(124, 124, 124);">
                </div>
            </div>

            <div class="container mt-3">
                <label for="vendedor"><strong>Producto</strong></label>
            </div>

        </div>

        <div class="container mt-3">

            <button type="button" class="add-product-row">Agregar Producto</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre producto</th>
                    <th>Cantidad</th>
                    <th>Monto</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="product-table">
                <tr class="product-row">
                    <td>
                        <select name="producto_id[]" class="form-select producto-select" required>
                            <option value="">Selecciona un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" data-nombre_producto="{{ $producto->nombre_producto }}" data-cantidad_stock="{{ $producto->cantidad_stock }}" data-precio_unitario="{{ $producto->precio_unitario }}" data-total="{{ $producto->total }}">{{ $producto->nombre_producto }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" class="form-control nombre-producto" name="nombre_producto[]" readonly style="background-color: rgb(225, 225, 225);">
                    </td>
                    <td><input type="number" class="form-control cantidad" name="cantidad[]" required></td>
                    <td><input type="number" class="form-control monto" name="monto[]"  required></td>
                    <td><input type="number" class="form-control total" name="total[]" readonly style="background-color: rgb(124, 124, 124);" required></td>
                    <td>
                        <button type="button" class="remove-product-row">Eliminar</button>
                    </td>
                </tr>
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
            });
        });
        </script>
    <script>
        document.getElementById('proveedor_id').addEventListener('change', function () {
            const selectedProveedor = this.options[this.selectedIndex];
            document.getElementById('nombre').value = selectedProveedor.getAttribute('data-nombre');
            document.getElementById('rut').value = selectedProveedor.getAttribute('data-rut');
            document.getElementById('direccion').value = selectedProveedor.getAttribute('data-direccion');
            document.getElementById('telefono').value = selectedProveedor.getAttribute('data-telefono');
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // ... (código existente)

        // Agregar producto dinámicamente
        document.querySelector(".add-product-row").addEventListener("click", function () {
            const newRow = document.querySelector(".product-row").cloneNode(true);
            newRow.querySelectorAll("input, select").forEach((element) => {
                element.value = "";
            });
            document.querySelector("#product-table").appendChild(newRow);
        });

        // Eliminar producto dinámicamente
        document.querySelector("table").addEventListener("click", function (event) {
            if (event.target.classList.contains("remove-product-row")) {
                if (document.querySelectorAll(".product-row").length > 1) {
                    event.target.closest(".product-row").remove();
                    actualizarTotal();
                }
            }
        });

        // Cálculo al seleccionar un producto o cambiar la cantidad/precio
        document.getElementById('product-table').addEventListener('change', function (event) {
            if (event.target.classList.contains("form-select") || event.target.classList.contains("form-control")) {
                actualizarTotal();
            }
        });

        function actualizarTotal() {
            // Obtener todas las filas de productos
            const filas = document.querySelectorAll(".product-row");

            // Actualizar el total para cada fila
            filas.forEach(function (fila) {
                const cantidad = fila.querySelector("input[name^='cantidad']").value || 0;
                const precio = fila.querySelector("input[name^='monto']").value || 0;
                const total = cantidad * precio;
                fila.querySelector("input[name^='total']").value = total;
            });
        }
    });
</script>
        </html>

    <script src="js/scripts.js"></script>

    @endsection
