<title>Detalles de Vendedor</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    @csrf
    <div class="container">
        <h1>Detalles de Vendedor</h1>
        <div class="card">
            <div class="card-body">
                <div class="detalle-label">Nombres:</div>
                <div class="detalle-value">Nombres del Vendedor</div>

                <div class="detalle-label">Apellido:</div>
                <div class="detalle-value">Apellido</div>

                <div class="detalle-label">RUT:</div>
                <div class="detalle-value">RUT del Vendedor</div>

                <div class="detalle-label">Email:</div>
                <div class="detalle-value">Email del Vendedor</div>

                <div class="detalle-label">Telefono:</div>
                <div class="detalle-value">Telefono del Vendedor</div>

                <div class="detalle-label">Estado Laboral:</div>
                <div class="detalle-value">Estado Laboral del Vendedor</div>
            </div>
        </div>
    </div>

@endsection
