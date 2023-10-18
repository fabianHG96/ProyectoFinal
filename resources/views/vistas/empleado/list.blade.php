<title>Lista Empleados</title>
@extends('layouts.main')
@section('main-content')
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
            <th>Acciones</th>
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
                <td>{{ $empleado->cargo }}</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

