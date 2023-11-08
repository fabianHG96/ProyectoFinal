<title>Detalles de la orden de compra</title>
@extends('layouts.main')
@section('main-content')
    <h1>Detalles de la orden de compra</h1>
    <form method="POST" action="{{ route('UpdateOrdenDeCompra', ['id' => $ordendecompra->id]) }}">
        @csrf
        <div class="row mt-4">
            <!-- Columna 1: Proveedor -->
            <div class="col-md-6">
                <!-- Datos Solicitante -->
                <label for="solicitante"><strong>Datos Solicitante</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre Solicitante</span>
                    <select name="empleado_id" id="empleado_id" class="form-select">
                        <option value="">Selecciona un empleado</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}" @if($empleado->id == $ordendecompra->empleado_id) selected @endif>
                                {{ $empleado->nombre }}
                            </option>
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
                            <option value="{{ $proveedor->id }}" data-nombre="{{ $proveedor->nombre }}" data-rut="{{ $proveedor->rut }}" data-direccion="{{ $proveedor->direccion }}" data-telefono="{{ $proveedor->telefono }}" @if($proveedor->id == $ordendecompra->proveedor_id) selected @endif>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" readonly value="{{ $ordendecompra->proveedor->nombre }}" style="background-color: rgb(124, 124, 124);">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Rut</span>
                    <input type="text" class="form-control" name="rut" id="rut" readonly value="{{ $ordendecompra->proveedor->rut }}" style="background-color: rgb(124, 124, 124);">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Dirección</span>
                    <input type="text" class="form-control" name="direccion" id="direccion" readonly value="{{ $ordendecompra->proveedor->direccion }}" style="background-color: rgb(124, 124, 124);">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Teléfono</span>
                    <input type="text" class="form-control" name="telefono" id="telefono" readonly value="{{ $ordendecompra->proveedor->telefono }}" style="background-color: rgb(124, 124, 124);">
                </div>
            </div>

            <!-- Columna 2: Vendedor -->
            <div class="col-md-6">
                <!-- Fechas de la Solicitud -->
                <label for="fechas"><strong>Fechas de la Solicitud</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Inicio</span>
                    <input type="date" class="form-control" name="fsolicitud" id="fsolicitud" value="{{ $ordendecompra->fecha_solicitud }}" readonly>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Término</span>
                    <input type="date" class="form-control" name="ftermino" id="ftermino" value="{{ $ordendecompra->fecha_termino }}" readonly>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Estado de la orden</span>
                    <select name="estado" id="estado" class="form-select" readonly>
                        <option value="">Selecciona el estado</option>
                        @if ($ordendecompra)
                            @php
                                $estados = ['aprobado', 'rechazado', 'en_proceso', 'pendiente_revision', 'cancelado', 'completado', 'en_espera'];
                            @endphp
                            @foreach ($estados as $estado)
                                @if($estado == $ordendecompra->estado)
                                    <option value="{{$estado}}" selected>
                                        {{ ucfirst(str_replace('_', ' ', $estado)) }}
                                    </option>
                                @else
                                    <option value="{{$estado}}">
                                        {{ ucfirst(str_replace('_', ' ', $estado)) }}
                                    </option>
                                @endif
                            @endforeach
                        @else
                            @foreach ($estados as $estado)
                                <option value="{{$estado}}">
                                    {{ ucfirst(str_replace('_', ' ', $estado)) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Datos Vendedor -->
                <label for="vendedor"><strong>Datos Vendedor</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre Vendedor</span>
                    <select name="vendedor_id" id="vendedor_id" class="form-select">
                        <option value="">Selecciona un vendedor</option>
                        @foreach ($vendedores as $vendedor)
                            <option value="{{ $vendedor->id }}" data-proveedor="{{ $vendedor->proveedor_id }}" data-nombre="{{ $vendedor->nombre }}" data-email="{{ $vendedor->email }}" data-telefono="{{ $vendedor->telefono }}" @if($vendedor->id == $ordendecompra->vendedor_id) selected @endif>
                                {{ $vendedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" name="vnombre" id="vnombre" readonly style="background-color: rgb(124, 124, 124);" value="{{ $vendedor->nombre }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" name="vemail" id="vemail" readonly style="background-color: rgb(124, 124, 124);" value="{{ $vendedor->email }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Teléfono</span>
                    <input type="text" class="form-control" name="tvendedor" id="tvendedor" readonly style="background-color: rgb(124, 124, 124);" value="{{ $vendedor->telefono }}">
                </div>
            </div>

            <!-- Detalles orden de compra -->
            <label for="producto"><strong>Producto</strong></label>
            <div class="input-group mt-2">
                <span class="input-group-text">Nombre producto</span>
                <select name="producto_id" id="producto_id" class="form-select">
                    <option value="">Selecciona un producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}" @if($producto->id == $ordendecompra->producto_id) selected @endif>
                            {{ $producto->nombre_producto }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" class="form-control" name="nombre_producto" id="nombre_producto" readonly style="background-color: rgb(225, 225, 225);" value="{{ $ordendecompra->nombre_producto }}">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Cantidad</span>
                <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ $ordendecompra->cantidad }}" readonly>
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Monto</span>
                <input type="number" class="form-control" name="monto" id="monto" value="{{ $ordendecompra->monto }}" readonly>
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text">Total</span>
                <input type="number" class="form-control" name="total" id="total" value="{{ $ordendecompra->total }}" readonly>
            </div>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- JavaScript para la actualización de campos -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Actualización de campos basada en la selección
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
            document.getElementById('nombre_producto').value = selectedOption.getAttribute('data-nombre_producto');
        });
    </script>
@endsection
