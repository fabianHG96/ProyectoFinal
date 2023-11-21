<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>IntegralFlex</title>
    <link rel="icon" href="{!! asset('assets\favicon.ico') !!}"/>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="http://localhost/ProyectoFinal/public/js/scripts.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @stack('css')

</head>

<!-- CAMBIO DE TEMA DE CLARO A OSCURO-->
<body data-bs-theme="dark">
    <div class="d-flex justify-content-between align-items-center border p-2">
    @if (Auth::check())
        <a class="navbar-brand">Bienvenido {{ Auth::user()->name }}</a>
    @else
        <script>
            window.location = "{{ route('login') }}";
        </script>
    @endif
<!-- Agrega este botón donde quieras en tu vista -->
<button id="mostrarAlertas" class="btn btn-primary">Mostrar Alertas</button>

<!-- Modal -->
<div class="modal fade" id="alertasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notificaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(auth()->check())
                    @php
                        $productosConStockBajo = \App\Models\Producto::where('cantidad_stock', '<', 10)->count();
                    @endphp

                    @if($productosConStockBajo > 0)
                        <div class="alert alert-warning">
                            <p class="mb-0">¡Atención! Algunos productos tienen un stock por debajo de 10.</p>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <p class="mb-0">No hay productos con stock por debajo de 10.</p>
                        </div>
                    @endif
                @else
                    <div class="alert alert-info mb-0">
                        <p class="mb-0">No hay notificaciones.</p>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('mostrarAlertas').addEventListener('click', function() {
        $('#alertasModal').modal('show'); // Mostrar la ventana modal
    });
</script>

<label for="nombres"><strong>IntegralFlex</strong></label>
<!-- Botón y estructura -->
<div >
    <button onclick="cambiarTema()" class="btn btn-outline-primary mr-5">
        <i id="ICON" class="fa-regular fa-sun"></i>
        <span id="modoTexto">Modo Claro</span>
    </button>

    <a class="btn btn-outline-primary" href="{{ route('logout') }}">Cerrar Sesión</a>
</div>
</div>



    <div class="container-fluid">
        <div class="row">
            @if (Auth::check())
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">
                                    <i class="fa-solid fa-house"></i> Dashboard
                                </a>
                            </li>
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ListOrdenDeCompra') }}">
                                    <i class="fa-solid fa-file-invoice-dollar"></i> Orden de Compra
                                </a>
                            </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 2 ))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ListEmpleado') }}">
                                        <i class="fa-solid fa-helmet-safety"></i> Empleados
                                    </a>
                                </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 5))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ListProveedor') }}">
                                    <i class="fa-solid fa-hand-holding"></i> Proveedores
                                </a>
                            </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 6 ))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ListBodega') }}">
                                        <i class="fa-solid fa-warehouse"></i> Bodega
                                    </a>
                                </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 4 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 6))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ListProductos') }}">
                                    <i class="fa-solid fa-box-open"></i> Productos
                                    </a>
                                </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 4))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ListCategoria') }}">
                                        <i class="fa-solid fa-inbox"></i> Categoria
                                    </a>
                                </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 5))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ListVendedor') }}">
                                        <i class="fa-regular fa-handshake"></i> Vendedores
                                    </a>
                                </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 2 ))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ListClienteEmpresa') }}">
                                        <i class="fa-solid fa-users"></i> Cliente Empresa
                                    </a>
                                </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 2 && Auth::user()->cargo_id != 5 ))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ListEmpresa') }}">
                                        <i class="fa-solid fa-building"></i> Empresas
                                    </a>
                                </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 2 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 4 && Auth::user()->cargo_id != 5))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-chart-line"></i> Seguimientos
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 4 && Auth::user()->cargo_id != 5))
                                            <li><a class="dropdown-item" href="{{ route('SeguimientoClientes') }}">SeguimientoClientes</a></li>
                                            <li><a class="dropdown-item" href="{{ route('SeguimientoProveedores') }}">SeguimientoProveedores</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('SeguimientoProductos') }}">SeguimientoProductos</a></li>
                                        @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 5))
                                            <li><a class="dropdown-item" href="{{ route('listFactura') }}">RespaldoFacturas</a></li>
                                        @endif
                                        @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 2 && Auth::user()->cargo_id != 5))
                                            <li><a class="dropdown-item" href="{{ route('Usuarios') }}">Usuarios</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (!(Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 2 && Auth::user()->cargo_id != 5 ))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fa-solid fa-user-plus"></i> Crear Nuevo Usuario
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            @else
                <script>
                    window.location = "{{ route('login') }}";
                </script>
            @endif

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('main-content')


                   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="{{ asset('js/scripts.js') }}"></script>


                @stack('js')
            </main>
        </div>
    </div>
    <div class="modal fade" id="noPermissionsModal" tabindex="-1" role="dialog" aria-labelledby="noPermissionsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noPermissionsModalLabel">Acceso no autorizado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" onclick="cerrarModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lo sentimos, no tiene permisos para acceder a esta página.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarModal()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Función para cerrar el modal y redirigir a la vista 'home'
        function cerrarModal() {
            window.location.href = "{{ route('home') }}";
        }

        // Asignar el evento hidden.bs.modal para llamar a cerrarModal() cuando se cierra el modal
        $('#noPermissionsModal').on('hidden.bs.modal', function () {
            cerrarModal();
        });
    </script>
</body>
</html>
