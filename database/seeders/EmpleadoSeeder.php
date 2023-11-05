<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empleado::create([
            'empresa_id' => '1',
            'bodega_id' => '1',
            'cargo_id' => '1',
            'nombre' => 'Juan',
            'apellido_p' => 'Monte',
            'apellido_m' => 'Torres',
            'rut' => '12345678-9', // Rut único
            'email' => 'empleado@example.com', // Email único
            'telefono' => '123456789',
            'direccion' => 'Dirección del Empleado',
            'Fcontratacion' => '2023-01-15',
            'salario' => '50000', // Salario (debes configurar el tipo de columna en la base de datos)
            'estado_laboral' => 'Activo',
            'horario' => 'Horario del Empleado',
            'Ftermino' => null, // Puede ser nulo si el empleado aún trabaja
        ]);

        // Repite este bloque para crear más empleados si es necesario

    }
}
