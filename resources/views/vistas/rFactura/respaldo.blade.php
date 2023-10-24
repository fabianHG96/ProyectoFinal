@extends('layouts.main')

@section('main-content')
<div class="container">
    <h1 class="align-self-end">Respaldos Facturas</h1>
    <div class="col-md-9">
        <div class="">
            <a class="btn btn-primary align-self-end" href="list">Lista Respaldos Facturas</a>
        </div>
    </div>

    <!-- Mostrar mensaje de éxito si existe -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('subirFactura') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="archivo_pdf">
        <button type="submit">Subir PDF</button>
    </form>
</div>
@endsection

