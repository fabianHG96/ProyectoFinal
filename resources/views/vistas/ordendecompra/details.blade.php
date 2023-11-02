<title>Detalles de la ordend e compra</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    @csrf
    <div class="container">
        <h1>Detalles de la compra</h1>
        <div class="card">
            <div class="card-body">
                <div class="detalle-label">Fecha de la solicitud:</div>
                <div class="detalle-value">Fecha de la solicitud de la orden de compra</div>

                <div class="detalle-label">Detalles:</div>
                <div class="detalle-value">Detalles de la orden de compra</div>

                <div class="detalle-label">Estado:</div>
                <div class="detalle-value">Estado de la orden de compra</div>

                <div class="detalle-label">Total:</div>
                <div class="detalle-value">Total de la orden de compra</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    @endsection
