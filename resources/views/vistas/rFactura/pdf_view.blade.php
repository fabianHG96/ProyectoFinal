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


    <table class="table">
        <tbody>
            <!-- Ejemplo de una fila de datos (puedes repetir para cada factura) -->
            @foreach ($mostrarfactura as $factura)
                <tr>
                    <td>
                        @if ($factura->pdf_contenido)
                            <iframe src="data:application/pdf;base64,{{ base64_encode($factura->pdf_contenido) }}"
                                    style="width: 100%; height: 500px;"
                                    frameborder="0">
                            </iframe>
                        @else
                            <p>PDF no encontrado</p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
