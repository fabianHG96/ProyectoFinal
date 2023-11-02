<title>Detalles de la Categoria</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    @csrf
    <div class="container">
        <h1>Detalles de la Categoria</h1>
        <div class="card">
            <div class="card-body">
                <div class="detalle-label">Categoria:</div>
                <div class="detalle-value">Categoria del prodcuto</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    @endsection
