@extends('layouts.main')
@section('main-content')
<div class="container">
    <h1>Respaldos Facturas</h1>
    <div class="col-md-9">
        <div class="">
            <a class="btn btn-primary" href="{{ url('facturas') }}">Nuevo Respaldos Facturas</a>
        </div>
    </div>

    <object data="{{ $pdfPath }}" type="application/pdf" width="100%" height="500">
        <embed src="{{ $pdfPath }}" type="application/pdf" />
    </object>


</div>
<!-- No olvides cargar tus scripts al final del documento HTML para una mejor optimización -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
