<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cargosSeeder extends Seeder
{
    public function run(): void
    {
        Cargo::create(['cargo' => 'Gerente General']);
        Cargo::create(['cargo' => 'Gerente de Recursos Humanos']);
        Cargo::create(['cargo' => 'Analista Financiero']);
        Cargo::create(['cargo' => 'Gerente de Marketing']);
        Cargo::create(['cargo' => 'Desarrollador Web']);
        Cargo::create(['cargo' => 'Bodeguero']);
    }
}
