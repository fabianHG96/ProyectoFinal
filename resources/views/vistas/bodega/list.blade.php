<title>Bodegas</title>
@extends('layouts.main')
@section('main-content')
<head>
    <div class="col-md-9">
        <div class="">
            <h1 class="align-self-end">Bodegas</h1>

            <a class="btn btn-primary align-self-end" href="create">Nueva Bodega</a>
        </div>
    </head>
    <table class="table">
        <thead>
            <tr>
                <th>Direccion</th>
                <th>Capacidad</th>
                <th>Stock</th>
                <th>Acciones</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
