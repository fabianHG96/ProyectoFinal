<title>Bodegas</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 6 )
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Bodegas</h1>
        </div>
            <div>
                <a class="btn btn-primary align-self-end" href="create">Nueva Bodega</a>

            </div>
            <div style="padding-left: 1000px">
                <a class="btn btn-primary align-self-end ms-2" href="{{ route('ListProductos') }}">Ver Productos</a>
            </div>
        <hr />
    </section>
    <table class="table">
        <thead>
            <tr>
                <th>Direccion</th>
                <th>Capacidad</th>
                <th>Stock</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($mostrarbodega->sortBy('id') as $bodega)
            <tr>
               <td>{{ $bodega->direccion }}</td>
               <td>{{ $bodega->capacidad }}</td>
               <td>{{ $bodega->stock }}</td>
               <td>

                <form action="{{ route('eliminarBodega', $bodega->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
            <td><a href="{{ route('ShowUpdateBodega', $bodega->id) }}" class="btn btn-primary btn-sm">Actualizar</a></td>
            <td><a href="{{ route('DetailsBodega', $bodega->id) }}" class="btn btn-primary btn-sm">Detalles</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
@endsection
