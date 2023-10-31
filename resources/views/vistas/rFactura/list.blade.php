@extends('layouts.main')

@section('main-content')
<div class="container">
    <h1 class="align-self-end">Respaldos Facturas</h1>
    <div class="col-md-9">
        <div class="">
            <button class="btn btn-primary align-self-end" data-toggle="modal" data-target="#subirFacturaModal">
                Subir factura
            </button>
        </div>
    </div>

    <!-- Mostrar mensaje de éxito si existe -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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

<!-- Modal para subir facturas -->
<div class="modal fade" id="subirFacturaModal" tabindex="-1" role="dialog" aria-labelledby="subirFacturaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subirFacturaModalLabel">Subir Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subirFactura') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre_archivo">Nombre del archivo:</label>
                        <input type="text" name="nombre_archivo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="archivo_pdf">Seleccionar archivo PDF:</label>
                        <input type="file" name="archivo_pdf" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Subir PDF</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
