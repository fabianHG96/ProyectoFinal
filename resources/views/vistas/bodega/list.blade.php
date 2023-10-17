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
                <th>Stock</th
            </tr>
        </thead>
        <tbody>
            @foreach($mostrarbodega->sortBy('id') as $bodega)
            <tr>
               <td>{{ $bodega->direccion }}</td>
               <td>{{ $bodega->capacidad }}</td>
               <td>{{ $bodega->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
