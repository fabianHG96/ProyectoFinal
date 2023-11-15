<title>Detalles de Empleado</title>
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
        <section>
            <div class="header-and-button d-flex justify-content-between align-items-center">
                <h1 class="header">Detalles del empleado</h1>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('ListEmpleado') }}">Volver a la lista</a>
            </div>
            <hr />
        </section>
        <form method="POST" action="{{ route('UpdateEmpleado', $empleado->id) }}">
            @csrf
            <input type="hidden" name="empresa_id" value="1">
            <input type="hidden" name="_method" value="POST">
            <div class="row mt-4">
                <div class="col-md-6">
                    <h2>{{ $empleado->nombre }}</h2>
                    <p>Creado el: {{ $empleado->created_at->format('d/m/Y H:i:s') }}</p>
                    <p>Última actualización: {{ $empleado->updated_at->format('d/m/Y H:i:s') }}</p>

                    <div class="details">
                        <p><strong>Nombres:</strong> {{ $empleado->nombre }}</p>
                        <p><strong>Apellido Paterno:</strong> {{ $empleado->apellido_p }}</p>
                        <p><strong>Apellido Materno:</strong> {{ $empleado->apellido_m }}</p>
                        <p><strong>RUT:</strong> {{ $empleado->rut }}</p>
                        <p><strong>Email:</strong> {{ $empleado->email }}</p>
                        <p><strong>Telefono:</strong> {{ $empleado->telefono }}</p>
                        <p><strong>Direccion:</strong> {{ $empleado->direccion }}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="patent"><strong>Datos del trabajo</strong></label>
                    <div class="details">
                        <p><strong>Fecha de contratacion:</strong> {{ $empleado->Fcontratacion }}</p>
                        <p><strong>Salario:</strong> {{ $empleado->salario }}</p>
                        <p><strong>Horario:</strong> {{ $empleado->horario }}</p>
                        <p><strong>Estado Laboral:</strong> {{ $empleado->estado_laboral }}</p>
                        <p><strong>Fecha de Finalizacion:</strong> {{ $empleado->Ftermino }}</p>
                        <p><strong>Cargo:</strong> {{ $empleado->cargo ? $empleado->cargo->cargo : 'Sin cargo asignado' }}</p>

                    </div>
                </div>
            </div>
        </form>
    </div>
    @if($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
@endsection
