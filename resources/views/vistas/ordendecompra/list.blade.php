<title>Orden de Compra</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
    <div class="container">

        <head>
            <div class="col-md-9">
                <div class="">
                    <h1 class="align-self-end">Listado Orden de Compra</h1>

                    <a class="btn btn-primary align-self-end" href="create">Nueva Orden de la compra</a>
                </div>
        </head>

        <body>
            <table class="table">
                <thead>
                    <tr>
                        <th>Proveedor</th>
                        <th>N°Orden de compra</th>
                        <th>Estado</th>
                        <th>Fecha Solicitud</th>
                        <th>Fecha Termino</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mostrarordenes as $ordendecompra )
                    <tr>
                        <td>{{ $ordendecompra->nombre_proveedor }}</td>
                        <td>{{ $ordendecompra->id }}</td>
                        <td>{{ $ordendecompra->estado }}</td> {{-- TODO --}}
                        <td>{{ $ordendecompra->fecha_solicitud }}</td>
                        <td>{{ $ordendecompra->fecha_termino }}</td>
                        <td>
                            <form action="{{ route('EliminarOrdenDeCompra', $ordendecompra->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('showUpdateOrdenDeCompra', $ordendecompra->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
                        </td>
                        <td><a href="{{ route('DetailsOrdenDeCompra', $ordendecompra->id) }}" class="btn btn-primary btn-sm">Detalles</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </body>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    @endsection
