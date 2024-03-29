<title>Lista de la empresa</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 2 && Auth::user()->cargo_id != 5 )
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<div class="container">
    <div class="col-md-9">
        <div class="">
            <h1 class="align-self-end">Empresas</h1>

            <a class="btn btn-primary align-self-end" href="create">Nueva Empresa</a>
        </div>
    </div>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre empresa</th>
                <th>RUT empresa</th>
                <th>Pais</th>
                <th>Region</th>
                <th>Rubro</th>
                <th>Fecha de la Fundacion</th>
                <th>email</th>
                <th>telefono</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mostrarempresa as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->rut }}</td>
                <td>{{ $empresa->pais }}</td>
                <td>{{ $empresa->region }}</td>
                <td>{{ $empresa->rubro }}</td>
                <td>{{ $empresa->Ffundacion }}</td>
                <td>{{ $empresa->email }}</td>
                <td>{{ $empresa->telefono }}</td>
                <td>
                    <form action="{{ route('eliminarEmpresa', $empresa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('showUpdateEmpresa', $empresa->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
                </td>
                <td>
                    <a href="{{ route('DetailsEmpresa', $empresa->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
