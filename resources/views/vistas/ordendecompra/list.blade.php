<title>Orden de Compra</title>
@extends('layouts.main')
@section('main-content')
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mostrarordenes as $ordendecompra )
                        <td>{{ $ordendecompra->proveedor_id }}</td>
                        <td>{{ $ordendecompra->id }}</td>
                        <td>Completado</td> //TODO
                        <td>{{ $ordendecompra->fecha_solicitud }}</td>
                        <td>{{ $ordendecompra->fecha_termino }}</td>
                        <td>
                            <form action="{{ route('EliminarOrdenDeCompra', $ordendecompra->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </body>
    </div>
    @endsection
