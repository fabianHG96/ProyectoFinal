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
            'nombre' => 'Juan',
            'apellido' => 'Gutierrez',
            'rut' => '20.452.324-3',
            'direccion' => 'Calle Los Alamos 1234, Valparaíso, Chile',
            'email' => 'JuanG@gmail.com',
            'telefono' => '+569119546',
            'estado_laboral' => 'Activo',
            'proveedor_id' => '1'
        ]);

        Vendedor::create([
            'nombre' => 'Juan',
            'apellido' => 'Gutierrez',
            'rut' => '20.452.324-3',
            'direccion' => 'Calle Los Alamos 1234, Valparaíso, Chile',
            'email' => 'JuanG@gmail.com',
            'telefono' => '+569119546',
            'estado_laboral' => 'Activo',
            'proveedor_id' => '2'
        ]);

        Vendedor::create([
            'nombre' => 'Alfredo',
            'apellido' => 'Larra',
            'rut' => '20.452.324-3',
            'direccion' => 'Gonzales baesa 12',
            'email' => 'Al.Larra@gmail.com',
            'telefono' => '+569119546',
            'estado_laboral' => 'Activo',
            'proveedor_id' => '3'
        ]);

        Vendedor::create([
            'nombre' => 'Alfredo',
            'apellido' => 'Larra',
            'rut' => '20.452.324-3',
            'direccion' => 'Gonzales baesa 12',
            'email' => 'Al.Larra@gmail.com',
            'telefono' => '+569119546',
            'estado_laboral' => 'Activo',
            'proveedor_id' => '4'
        ]);
    }
}

