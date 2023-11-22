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

        // Producto 1
Producto::create([
    'bodega_id' => '1',
    'categoria_id' => '1',
    'total' => 120000,
    'cantidad_stock' => 8,
    'precio_unitario' => 15000,
    'nombre_producto' => 'Válvula Hidráulica A',
]);

// Producto 2
Producto::create([
    'bodega_id' => '1',
    'categoria_id' => '1',
    'total' => 90000,
    'cantidad_stock' => 12,
    'precio_unitario' => 8000,
    'nombre_producto' => 'Manguera Flexible B',
]);

// Producto 3
Producto::create([
    'bodega_id' => '1',
    'categoria_id' => '1',
    'total' => 110000,
    'cantidad_stock' => 10,
    'precio_unitario' => 11000,
    'nombre_producto' => 'Cilindro Hidráulico C',
]);

// Producto 4
Producto::create([
    'bodega_id' => '1',
    'categoria_id' => '1',
    'total' => 75000,
    'cantidad_stock' => 15,
    'precio_unitario' => 5000,
    'nombre_producto' => 'Conector Rápido D',
]);

// Producto 5
Producto::create([
    'bodega_id' => '1',
    'categoria_id' => '1',
    'total' => 130000,
    'cantidad_stock' => 7,
    'precio_unitario' => 18000,
    'nombre_producto' => 'Bomba Hidráulica E',
]);
    }
}
