<title>Detalles de Empleado</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    @csrf
    <div class="container">
        <h1>Detalles de Empleado</h1>
        <div class="card">
            <div class="card-body">
                <div class="detalle-label">Nombres:</div>
                <div class="detalle-value">Nombres del Empleado</div>

                <div class="detalle-label">Apellido Paterno:</div>
                <div class="detalle-value">Apellido Paterno del Empleado</div>

                <div class="detalle-label">Apellido Materno:</div>
                <div class="detalle-value">Apellido Materno del Empleado</div>

                <div class="detalle-label">RUT:</div>
                <div class="detalle-value">RUT del Empleado</div>

                <div class="detalle-label">Fecha de Contratación:</div>
                <div class="detalle-value">Fecha de Contratación del Empleado</div>

                <div class="detalle-label">Salario:</div>
                <div class="detalle-value">Salario del Empleado</div>

                <div class="detalle-label">Estado Laboral:</div>
                <div class="detalle-value">Estado Laboral del Empleado</div>

                <div class="detalle-label">Dirección:</div>
                <div class="detalle-value">Dirección del Empleado</div>

                <div class="detalle-label">Inicio:</div>
                <div class="detalle-value">Fecha de Inicio del Empleado</div>

                <div class="detalle-label">Término:</div>
                <div class="detalle-value">Fecha de Término del Empleado</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    @endsection
