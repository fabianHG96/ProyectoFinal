<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empresa::create([
            'nombre' => 'HidraulicaSur',
            'rut' => '12345678-8',
            'pais' => 'Chile',
            'region' => 'Región del Biobío',
            'direccion' => 'Calle Los Ríos 123',
            'rubro' => 'Hidráulica',
            'Ffundacion' => '2022-01-01',
            'email' => 'contacto@hidraulicasur.cl',
            'telefono' => '123456789',
        ]);

        Empresa::create([
            'nombre' => 'AquaIngenieria',
            'rut' => '98765432-1',
            'pais' => 'Chile',
            'region' => 'Región Metropolitana',
            'direccion' => 'Avenida del Agua 456',
            'rubro' => 'Ingeniería Hidráulica',
            'Ffundacion' => '2022-02-15',
            'email' => 'info@aquaingenieria.cl',
            'telefono' => '987654321',
        ]);

        Empresa::create([
            'nombre' => 'FlujoTec',
            'rut' => '54321987-6',
            'pais' => 'Chile',
            'region' => 'Región de Valparaíso',
            'direccion' => 'Pasaje Los Canales 789',
            'rubro' => 'Tecnología Hidráulica',
            'Ffundacion' => '2022-03-20',
            'email' => 'soporte@flujotec.cl',
            'telefono' => '543219876',
        ]);

    }
}
