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
        'fecha_solicitud' => '2023-01-15',
        'fecha_termino' => '2023-01-15',
        'proveedor_id' => '2',
        'vendedor_id' => '1',
        'nombre_producto' => 'Placa Metalica',
        'cantidad' => '10',
        'monto' => '20000',
        'total' => '200000',
        //'estado' => 'Completado',
        ]);
    }
}