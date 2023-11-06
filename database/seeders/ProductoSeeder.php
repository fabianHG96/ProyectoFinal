<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'bodega_id' => '1',  // ID de la bodega a la que pertenece el producto
            'categoria_id' => '1',
            'total' => 200000,   // ID de la categoría del producto (puedes cambiarlo según la categoría de hidráulica)
            'cantidad_stock' => 10,  // Cantidad en stock
            'precio_unitario' => 20000,  // Precio unitario del producto
            'nombre_producto' => 'Placa Metálica',  // Nombre del producto
        ]);
    }
}
