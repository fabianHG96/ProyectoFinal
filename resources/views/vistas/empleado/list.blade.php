<title>Lista Empleados</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 5 && Auth::user()->cargo_id != 2 )
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
        <h1 class="align-self-end">Empleados</h1>

        <a class="btn btn-primary align-self-end" href="create">Nuevo Empleado</a>
    </div>
</head>

<body>
    <table class="table">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>RUT</th>
            <th>Fecha de Contratación</th>
            <th>Salario</th>
            <th>Estado Laboral</th>
            <th>Dirección</th>
            <th>Cargo</th>
            <th>Inicio</th>
            <th>Término</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach($mostrarempleado as $empleado)
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido_p }}</td>
                <td>{{ $empleado->apellido_m }}</td>
                <td>{{ $empleado->rut }}</td>
                <td>{{ $empleado->Fcontratacion }}</td>
                <td>
                    @if ($empleado->salario !== null)
                        ${{ $empleado->salario }}
                    @endif
                </td>

                <td>{{ $empleado->estado_laboral }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>{{ $empleado->cargos->cargo }}</td>
                <td>{{ $empleado->Fcontratacion }}</td>
                <td>
                    @if ($empleado->Ftermino === null)
                        Aún Activo
                    @else
                        {{ $empleado->Ftermino }}
                    @endif
                </td>
                <td>
                    <form action="{{ route('eliminarEmpleado', $empleado->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('showUpdateEmpleado', $empleado->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
                </td>
                <td>
                    <a href="{{ route('DetailsEmpleado', $empleado->id) }}" class="btn btn-primary btn-sm">Detalles</a>
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
