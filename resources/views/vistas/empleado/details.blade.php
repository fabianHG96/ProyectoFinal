@extends('layouts.main')
@section('main-content')
<div class="container">
    @csrf
    <div class="container">
        <h1>Detalles de Persona</h1>
        <div class="card">
            <div class="card-body">
                <div class="detalle-label">Nombres:</div>
                <div class="detalle-value">Nombres de la Persona</div>

                <div class="detalle-label">Apellido Paterno:</div>
                <div class="detalle-value">Apellido Paterno de la Persona</div>

                <div class="detalle-label">Apellido Materno:</div>
                <div class="detalle-value">Apellido Materno de la Persona</div>

                <div class="detalle-label">RUT:</div>
                <div class="detalle-value">RUT de la Persona</div>

                <div class="detalle-label">Fecha de Contratación:</div>
                <div class="detalle-value">Fecha de Contratación de la Persona</div>

                <div class="detalle-label">Salario:</div>
                <div class="detalle-value">Salario de la Persona</div>

                <div class="detalle-label">Estado Laboral:</div>
                <div class="detalle-value">Estado Laboral de la Persona</div>

                <div class="detalle-label">Dirección:</div>
                <div class="detalle-value">Dirección de la Persona</div>

                <div class="detalle-label">Inicio:</div>
                <div class="detalle-value">Fecha de Inicio de la Persona</div>

                <div class="detalle-label">Término:</div>
                <div class="detalle-value">Fecha de Término de la Persona</div>
            </div>
        </div>
    </div>

@endsection
