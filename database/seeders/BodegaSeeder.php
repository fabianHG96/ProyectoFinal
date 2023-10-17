<?php

namespace Database\Seeders;

use App\Models\Bodega;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bodega::create([
            'direccion' => 'Avenida Nueva Vista 747',
            'capacidad' => 1000,
            'stock' => 30,
        ]);
    }
}
