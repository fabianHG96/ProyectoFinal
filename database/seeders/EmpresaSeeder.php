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
            'nombre' => 'Empresa1',
            'rut' => '12345678-8',
            'pais' => 'País1',
            'region' => 'Región1',
            'direccion' => 'Dirección1',
            'rubro' => 'Rubro1',
            'Ffundacion' => '2022-01-01',
            'email' => 'empresa1@example.com',
            'telefono' => '123456789',
        ]);
        Empresa::create([
            'nombre' => 'Empresa2',
            'rut' => '98765432-1',
            'pais' => 'País2',
            'region' => 'Región2',
            'direccion' => 'Dirección2',
            'rubro' => 'Rubro2',
            'Ffundacion' => '2022-02-15',
            'email' => 'empresa2@example.com',
            'telefono' => '987654321',
        ]);

        Empresa::create([
            'nombre' => 'Empresa3',
            'rut' => '54321987-6',
            'pais' => 'País3',
            'region' => 'Región3',
            'direccion' => 'Dirección3',
            'rubro' => 'Rubro3',
            'Ffundacion' => '2022-03-20',
            'email' => 'empresa3@example.com',
            'telefono' => '543219876',
        ]);

    }
}
