@extends('layouts.main')
@section('main-content')


<div class="container">
    <form method="get" action="{{ route('SeguimientoFinanciero') }}">
        @csrf
        <label for="filtro_anio">Filtro por Año:</label>
        <select name="filtro_anio" id="filtro_anio">
            @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                <option value="{{ $i }}" {{ $filtroAnio == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>

        <button type="submit">Actualizar Gráfico</button>
    </form>

    <!-- Agregar el contenedor del gráfico -->
    <div>
        <canvas id="graficoSeguimiento"></canvas>
    </div>

    <!-- Agregar la tabla de seguimiento financiero por meses -->
    <table class="table">
        <thead>
            <tr>
                <th>Mes</th>
                <th>Ventas</th>
                <th>Compras</th>
                <th>Ganancias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultadosPorMes as $mes => $resultados)
                <tr>
                    <td>{{ $mes }}</td>
                    <td>{{ $resultados['ventas'] }}</td>
                    <td>{{ $resultados['compras'] }}</td>
                    <td>{{ $ganancias[$mes] }}</td>
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
<!-- Script para inicializar el gráfico -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        resultadosPorMes = {!! json_encode(array_values($resultadosPorMes)) !!};
        resultadosPorMes.sort((a, b) => a.mes - b.mes);
        var ctx = document.getElementById('graficoSeguimiento').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json(array_keys($resultadosPorMes)),
                datasets: [
                    {
                        label: 'Ventas',
                        data: @json(array_column($resultadosPorMes, 'ventas')),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Compras',
                        data: @json(array_column($resultadosPorMes, 'compras')),
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Ganancias',
                        data: @json(array_values($ganancias)),
                        backgroundColor: 'rgba(255, 205, 86, 0.2)',
                        borderColor: 'rgba(255, 205, 86, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                    id: 'custom-x-axis', // Configuramos el identificador personalizado para el eje X
                    type: 'category',

                },
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
