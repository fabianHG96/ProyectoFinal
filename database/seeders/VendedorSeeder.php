<?php

namespace Database\Seeders;

use App\Models\Vendedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendedor::create([
            'nombre' => 'Alfredo',
            'apellido' => 'Larra',
            'rut' => '20.452.324-3',
            'direccion' => 'Gonzales baesa 12',
            'email' => 'Al.Larra@gmail.com',
            'telefono' => '+569119546',
            'estado_laboral' => 'Empresario',
            'proveedor_id' => '2'
        ]);
    }
}

