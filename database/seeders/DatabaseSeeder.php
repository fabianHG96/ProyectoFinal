<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(cargosSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(BodegaSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(Cliente_EmpresaSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VendedorSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(OrdenDeCompraSeeder::class);

    }
}
