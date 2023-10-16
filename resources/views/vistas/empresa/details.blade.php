<title>Detalles de la Empresa</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    @csrf
    <div class="container">
        <h1>Detalles de la Empresa</h1>
        <div class="card">
            <div class="card-body">
                <div class="detalle-label">Nombre:</div>
                <div class="detalle-value">Nombre de la Empresa</div>

                <div class="detalle-label">RUT:</div>
                <div class="detalle-value">RUT de la Empresa</div>

                <div class="detalle-label">Pais:</div>
                <div class="detalle-value">Pais de la empresa</div>

                <div class="detalle-label">Region:</div>
                <div class="detalle-value">Region de la Empresa</div>

                <div class="detalle-label">Direccion:</div>
                <div class="detalle-value">Direccion de la Empresa</div>

                <div class="detalle-label">Rubro:</div>
                <div class="detalle-value">Rubro de la Empresa</div>

                <div class="detalle-label">Fecha de la Fundacion:</div>
                <div class="detalle-value">Fecha de la fundacion de la Empresa</div>

                <div class="detalle-label">Correo:</div>
                <div class="detalle-value">Correo de la Empresa</div>

                <div class="detalle-label">telefono:</div>
                <div class="detalle-value">telefono de la Empresa</div>
            </div>
        </div>
    </div>

@endsection
