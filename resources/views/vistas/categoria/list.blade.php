<title>Categoria</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 4)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<head>
    <div class="col-md-9">
        <div class="">
            <h1 class="align-self-end">Categoria</h1>

            <a class="btn btn-primary align-self-end" href="create">Nueva Categoria</a>
        </div>
    </head>
    <table class="table">
        <thead>
            <tr>
                <th>Categoria</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($mostrarcategoria->sortBy('id') as $categoria)
            <tr>
               <td>{{ $categoria->categoria }}</td>

               <td>

                <form action="{{ route('eliminarCategoria', $categoria->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
            <td><a href="{{ route('ShowUpdateCategoria', $categoria->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
            </td>
            <td><a href="{{ route('DetailsCategoria', $categoria->id) }}" class="btn btn-primary btn-sm">Detalles</a>
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
