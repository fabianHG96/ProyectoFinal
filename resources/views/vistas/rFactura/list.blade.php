@extends('layouts.main')

@section('main-content')
<div class="container">
    <h1 class="align-self-end">Respaldos Facturas</h1>
    <div class="col-md-9">
        <div class="">
            <a class="btn btn-primary align-self-end" href="facturas">Nuevo Respaldos Facturas</a>
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

    <table class="table">
        <thead>
            <tr>
                <th>Archivo PDF</th>
                <th>Descargar</th>
            </tr>
        </thead>
        <tbody>
            <!-- Ejemplo de una fila de datos (puedes repetir para cada factura) -->
            @foreach ($mostrarfactura as $factura)
                <tr>
                    <td>
                        {{ $factura->nombre_archivo }}
                    </td>
                    <td>
                        <a href="{{ route('descargar.pdf', ['id' => $factura->id]) }}" class="btn btn-primary">
                            Descargar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('leer.pdf', ['id' => $factura->id]) }}" class="btn btn-info">
                            Ver PDF
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
