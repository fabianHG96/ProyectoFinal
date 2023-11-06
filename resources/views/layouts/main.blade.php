<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IntegralFlex</title>
    <link rel="icon" href="{!! asset('assets\favicon.ico') !!}"/>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="http://localhost/ProyectoFinal/public/js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @stack('css')

</head>

<!-- CAMBIO DE TEMA DE CLARO A OSCURO-->
<body data-bs-theme="dark">
    <div class="d-flex justify-content-between align-items-center border p-2">
        <label for="nombres"><strong>IntegralFlex</strong></label>
<!-- Botón y estructura -->
<button onclick="cambiarTema()" class="btn btn-outline-primary">
    <i id="ICON" class="fa-regular fa-sun"></i>
    <span id="modoTexto">Modo Claro</span>
</button>



        @if (Auth::check())
            <a class="navbar-brand">Bienvenido {{ Auth::user()->name }}</a>
        @else
            <script>
                window.location = "{{ route('login') }}";
            </script>
        @endif
        <a class="btn btn-outline-primary" href="{{ route('logout') }}">Cerrar Sesión</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fa-solid fa-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ListOrdenDeCompra') }}">
                                <i class="fa-solid fa-file-invoice-dollar"></i> Orden de Compra
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ListEmpleado') }}">
                                <i class="fa-solid fa-helmet-safety"></i> Empleados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ListProveedor') }}">
                                <i class="fa-solid fa-hand-holding"></i> Proveedores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ListBodega') }}">
                                <i class="fa-solid fa-warehouse"></i> Bodega
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ListProductos') }}">
                            <i class="fa-solid fa-box-open"></i> Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ListVendedor') }}">
                                <i class="fa-regular fa-handshake"></i> Vendedores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ListClienteEmpresa') }}">
                                <i class="fa-solid fa-users"></i> Cliente Empresa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ListEmpresa') }}">
                                <i class="fa-solid fa-building"></i> Empresas
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-chart-line"></i> Seguimientos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('SeguimientoClientes') }}">SeguimientoClientes</a></li>
                                <li><a class="dropdown-item" href="{{ route('SeguimientoProductos') }}">SeguimientoProductos</a></li>
                                <li><a class="dropdown-item" href="{{ route('SeguimientoProveedores') }}">SeguimientoProveedores</a></li>
                                <li><a class="dropdown-item" href="{{ route('listFactura') }}">RespaldoFacturas</a></li>
                                <li><a class="dropdown-item" href="{{ route('Usuarios') }}">Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">
                                <i class="fa-solid fa-user-plus"></i> Crear Nuevo Usuario
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('main-content')
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

                   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="{{ asset('js/scripts.js') }}"></script>


                @stack('js')
            </main>
        </div>
    </div>
</body>
</html>
