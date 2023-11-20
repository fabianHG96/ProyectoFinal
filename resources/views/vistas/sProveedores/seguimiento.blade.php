<title>Seguimiento De Proveedores</title>
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
        <div>
            <!-- Agregar el contenedor del gráfico -->
            <canvas id="graficoSeguimiento"></canvas>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>Fecha Solicitud</th>
                    <th>Fecha Termino</th>
                    <th>
                        @if ($tipoConsulta === 'total_pedidos')
                            Total Pedidos
                        @elseif ($tipoConsulta === 'total_compras')
                            Total Compras
                        @else
                            Etiqueta Predeterminada
                        @endif
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="get" action="{{ route('SeguimientoProveedores') }}">
                    @csrf
                    <label for="tipo_consulta">Tipo de Consulta:</label>
                    <select name="tipo_consulta" id="tipo_consulta">
                        <option value="total_pedidos" {{ $tipoConsulta === 'total_pedidos' ? 'selected' : '' }}>Total Pedidos</option>
                        <option value="total_compras" {{ $tipoConsulta === 'total_compras' ? 'selected' : '' }}>Total Compras</option>
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
                        <td>{{ $resultado->nombre_proveedor }}</td>
                        <td>{{ $resultado->fecha_solicitud }}</td>
                        <td>{{ $resultado->fecha_termino }}</td>
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

            // En este caso, usamos nombre_proveedor como etiqueta y total como dato
            var labels = resultadosConsulta.map(item => item.nombre_proveedor);
            var data = resultadosConsulta.map(item => item.total);

            var ctx = document.getElementById('graficoSeguimiento').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: @json($tipoConsulta === 'total_pedidos' ? 'Total Pedidos' : 'Total Compras'),
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

