<title>Actualizar un Empleado</title>
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
            <h1 class="header">Actualizar un Empleado</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('UpdateEmpleado', $empleado->id) }}">
        @csrf
        <input type="hidden" name="empresa_id" value="1">
                <input type="hidden" name="empresa_id" value="1">
        <input type="hidden" name="_method" value="POST">
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="names"><strong>Datos de la Persona</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombres</span>
                    <input required type="text" class="form-control" name="nombre" id="nombre" value="{{ $empleado->nombre }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Apellido Paterno</span>
                    <input required type="text" class="form-control" name="apellido_p" id="apellido_p" value="{{ $empleado->apellido_p }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Apellido Materno</span>
                    <input required type="text" class="form-control" name="apellido_m" id="apellido_m" value="{{ $empleado->apellido_m }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">RUT</span>
                    <input required type="text" class="form-control" name="rut" id="rut" value="{{ $empleado->rut }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Email</span>
                    <input required type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Telefono</span>
                    <input required type="text" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Direccion</span>
                    <input required type="text" class="form-control" name="direccion" id="direccion" value="{{ $empleado->direccion }}">
                </div>
            </div>

            <div class="col-md-6">
                <label for="patent"><strong>Datos del trabajo</strong></label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de contratacion</span>
                    <input required type="date" class="form-control" name="Fcontratacion" id="Fcontratacion" value="{{ $empleado->Fcontratacion }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Salario</span>
                    <input required type="text" class="form-control" name="salario" id="salario" value="{{ $empleado->salario }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Horario</span>
                    <input required type="text" class="form-control" name="horario" id="horario" value="{{ $empleado->horario }}">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Estado Laboral</span>
                    <select required id="estado_laboral" name="estado_laboral" class="form-control">
                        <option value="activo" {{ $empleado->estado_laboral === 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ $empleado->estado_laboral === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha de Finalizacion</span>
                    <input required type="date" class="form-control" name="Ftermino" id="Ftermino" value="{{ $empleado->Ftermino }}">
                </div>
                <div class="input-group mt-2">
                    <label for="cargo_id" class="input-group-text">Seleccionar cargo</label>
                    <select required class="form-select" name="cargo_id" id="cargo_id">
                        @foreach($cargos as $cargo)
                            <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <input type="submit" value="Actualizar" class="btn btn-primary">
        </div>
    </form>
</div>
@if($errors->any())
    <div class="alert alert-danger">
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
