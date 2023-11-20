<title>Seguimiento Clientes</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 4 && Auth::user()->cargo_id != 5)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<div class="container">
    <head>
        <div class="col-md-9">
            <div class="">

            </div>
        </div>
    </head>

    <body>
        <!-- Agregar el contenedor del gráfico -->
        <div>
            <canvas id="graficoSeguimiento"></canvas>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Fecha Emision</th>
                    <th>
                        @if ($tipoConsulta === 'total_facturas')
                            Total Facturas
                        @elseif ($tipoConsulta === 'total_ventas')
                            Total Ventas
                        @else
                            Etiqueta Predeterminada
                        @endif
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="get" action="{{ route('SeguimientoClientes') }}">
                    @csrf
                    <label for="tipo_consulta">Tipo de Consulta:</label>
                    <select name="tipo_consulta" id="tipo_consulta">
                        <option value="total_facturas" {{ $tipoConsulta === 'total_facturas' ? 'selected' : '' }}>Total Facturas</option>
                        <option value="total_ventas" {{ $tipoConsulta === 'total_ventas' ? 'selected' : '' }}>Total Ventas</option>
                    </select>

                    <label for="fechaInicio">Fecha de Inicio:</label>
                    <input type="date" name="fechaInicio" value="{{ $fechaInicio }}">

                    <label for="fechaFin">Fecha de Fin:</label>
                    <input type="date" name="fechaFin" value="{{ $fechaFin }}">

                    <button type="submit">Actualizar Gráfico</button>
                </form>

                <!-- Iterar sobre los resultadosConsulta para llenar las filas de la tabla -->
                @foreach($resultadosConsulta as $resultado)
                    <tr>
                        <td>{{ $resultado->nombre_cliente }}</td>
                        <td>{{ $resultado->fecha_emision }}</td>
                        <td>{{ $resultado->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Incluir la biblioteca de Bootstrap y los scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Incluir la biblioteca de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Script para inicializar el gráfico -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var resultadosConsulta = @json($resultadosConsulta);

                        // En este caso, usamos nombre_cliente como etiqueta y total como dato
                        var labels = resultadosConsulta.map(item => item.nombre_cliente);
                        var data = resultadosConsulta.map(item => item.total);

                        var ctx = document.getElementById('graficoSeguimiento').getContext('2d');

                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: @json($tipoConsulta === 'total_facturas' ? 'Total Facturas' : 'Total Ventas'),
                                    data: data,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                </script>


    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
@endsection
