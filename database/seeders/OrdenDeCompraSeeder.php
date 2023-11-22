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
        'proveedor_id' => '2',
        'vendedor_id' => '1',
        'empleado_id' => '1',
        'nombre_producto' => 'Placa Metalica',
        'cantidad' => '10',
        'monto' => '20000',
        'total' => '200000',
        //'estado' => 'Completado',
        ]);
    }
}
