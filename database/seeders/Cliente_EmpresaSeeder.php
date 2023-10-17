<?php

namespace Database\Seeders;

use App\Models\ClienteEmpresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cliente_EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClienteEmpresa::create([
            'nombre' => 'Juan Pérez',
            'rut' => '12345678-9',
            'pais' => 'Chile',
            'region' => 'Metropolitana',
            'direccion' => 'Calle Principal 123',
            'email' => 'juan@example.com',
            'telefono' => '+56912345678',
        ]);

        ClienteEmpresa::create([
            'nombre' => 'María González',
            'rut' => '98765432-1',
            'pais' => 'Argentina',
            'region' => 'Buenos Aires',
            'direccion' => 'Avenida Central 456',
            'email' => 'maria@example.com',
            'telefono' => '+541112345678',
        ]);

        ClienteEmpresa::create([
            'nombre' => 'Carlos Rodríguez',
            'rut' => '55555555-5',
            'pais' => 'México',
            'region' => 'Ciudad de México',
            'direccion' => 'Calle Secundaria 789',
            'email' => 'carlos@example.com',
            'telefono' => '+525555555555',
        ]);

    }
}
