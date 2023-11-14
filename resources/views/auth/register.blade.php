<title>Crear Usuario</title>
@extends('layouts.main')
@section('main-content')
<form action="{{ route('register.store') }}" method="POST" >
@csrf
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center ">
        <div class="col-xl-10 col-lg-12 col-md-9 " >

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0 border border-primary" style="background: linear-gradient(to bottom, #7b68ee, #9370db, #8a2be2);">
                    <!-- Nested Row within Card Body -->
                    <div class="row " >
                        <div class="col-lg-6" style="margin-left: 225px" >
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><strong>CREAR CUENTA</strong></h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <strong class="">Nombre</strong>
                                        <input type="text" class="form-control form-control-user"
                                            id="name"
                                            placeholder="Ingrese nombre ..." name="name">
                                    </div>
                                    <div class="form-group">
                                        <strong class="">Apellido</strong>
                                        <input type="text" class="form-control form-control-user"
                                            id="apellidos" placeholder="Ingrese apellido ..." name="surname">
                                    </div>
                                    <div class="form-group">
                                        <strong class="">Email</strong>
                                        <input type="email" class="form-control form-control-user"
                                            id="email" aria-describedby="emailHelp"
                                            placeholder="Ingrese Email ..." name="email">
                                    </div>
                                    <div class="form-group">
                                        <strong class="">Cargo</strong>
                                        <select name="cargo_id" id="cargo_id" class="form-select">
                                            <option value="">Selecciona un cargo</option>
                                            @foreach ($cargos as $cargo)
                                                <option value="{{ $cargo->id }}" data-cargo="{{ $cargo->cargo }}">{{ $cargo->cargo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong class="">Contraseña</strong>
                                        <input type="password" class="form-control form-control-user"
                                            id="password" placeholder="Contraseña ..." name="password">
                                    </div>
                                    <div class="form-group">
                                        <strong class="">Repetir Contraseña</strong>
                                        <input type="password" class="form-control form-control-user"
                                            id="password" placeholder="Repite Contraseña ..." name="password_confirmation">
                                    </div>
                                    @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Crear Cuenta
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</form>
@endsection
