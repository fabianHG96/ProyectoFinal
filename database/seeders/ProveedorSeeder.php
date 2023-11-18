<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'nombre' => 'Proveedor 1',
            'rut' => '12345678-9',
            'pais' => 'Chile',
            'region' => 'Región X',
            'direccion' => 'Calle Proveedor 123',
            'telefono' => '+56 9 1234 5678',
            'email' => 'proveedor1@example.com',
            'rubro' => 'Rubro 1',
        ]);

        Proveedor::create([
            'nombre' => 'Proveedor 2',
            'rut' => '98765432-1',
            'pais' => 'Chile',
            'region' => 'Región Y',
            'direccion' => 'Avenida Proveedor 456',
            'telefono' => '+56 9 9876 5432',
            'email' => 'proveedor2@example.com',
            'rubro' => 'Rubro 2',
        ]);



    }
}
