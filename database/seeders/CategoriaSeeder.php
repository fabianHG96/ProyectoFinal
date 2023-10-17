<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['categoria' => 'Bombas Hidráulicas']);
        Categoria::create(['categoria' => 'Cilindros Hidráulicos']);
        Categoria::create(['categoria' => 'Válvulas Hidráulicas']);
        Categoria::create(['categoria' => 'Mangueras Hidráulicas']);
        Categoria::create(['categoria' => 'Filtros Hidráulicos']);
        Categoria::create(['categoria' => 'Acumuladores Hidráulicos']);
        Categoria::create(['categoria' => 'Accesorios Hidráulicos']);
        Categoria::create(['categoria' => 'Componentes Hidráulicos']);
        Categoria::create(['categoria' => 'Sistemas Hidráulicos']);

    }
}
