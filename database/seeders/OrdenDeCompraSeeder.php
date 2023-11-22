<?php

namespace Database\Seeders;

use App\Models\OrdenDeCompra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenDeCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrdenDeCompra::create([
        'fecha_solicitud' => '2022-01-15',
        'fecha_termino' => '2022-01-15',
        'nombre_proveedor'=> 'Flexloko',
        'proveedor_id' => '3',
        'vendedor_id' => '1',
        'empleado_id' => '1',
        'nombre_producto' => 'Placa Metalica',
        'cantidad' => '10',
        'monto' => '20000',
        'total' => '200000',
        //'estado' => 'Completado',
        ]);

        // Order 2
OrdenDeCompra::create([
    'fecha_solicitud' => '2021-01-17',
    'fecha_termino' => '2022-01-17',
    'nombre_proveedor'=> 'Proveedor 2',
    'proveedor_id' => '2',
    'vendedor_id' => '1',
    'empleado_id' => '1',
    'nombre_producto' => 'Manguera Flexible B',
    'cantidad' => '12',
    'monto' => '8000',
    'total' => '90000',
]);

// Order 3
OrdenDeCompra::create([
    'fecha_solicitud' => '2021-01-18',
    'fecha_termino' => '2022-01-18',
    'nombre_proveedor'=> 'Proveedor 2',
    'proveedor_id' => '2',
    'vendedor_id' => '1',
    'empleado_id' => '1',
    'nombre_producto' => 'Cilindro Hidráulico C',
    'cantidad' => '10',
    'monto' => '11000',
    'total' => '110000',
]);

// Order 4
OrdenDeCompra::create([
    'fecha_solicitud' => '2023-02-19',
    'fecha_termino' => '2022-03-19',
    'nombre_proveedor'=> 'Proveedor 2',
    'proveedor_id' => '2',
    'vendedor_id' => '1',
    'empleado_id' => '1',
    'nombre_producto' => 'Conector Rápido D',
    'cantidad' => '15',
    'monto' => '5000',
    'total' => '75000',
]);

// Order 5
OrdenDeCompra::create([
    'fecha_solicitud' => '2022-09-20',
    'fecha_termino' => '2022-10-20',
    'nombre_proveedor'=> 'Proveedor 2',
    'proveedor_id' => '2',
    'vendedor_id' => '1',
    'empleado_id' => '1',
    'nombre_producto' => 'Bomba Hidráulica E',
    'cantidad' => '7',
    'monto' => '18000',
    'total' => '130000',
]);
    }
}
