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

        Producto::create([
            'bodega_id' => '1',
            'categoria_id' => '1',
            'total' => 550000,
            'cantidad_stock' => 100,
            'precio_unitario' => 40000,
            'nombre_producto' => 'Tuerca',
        ]);

        Producto::create([
            'bodega_id' => '1',
            'categoria_id' => '1',
            'total' => 1000000,
            'cantidad_stock' => 5,
            'precio_unitario' => 50000,
            'nombre_producto' => 'Arandela',
        ]);

        Producto::create([
            'bodega_id' => '1',
            'categoria_id' => '1',
            'total' => 20000,
            'cantidad_stock' => 45,
            'precio_unitario' => 10,
            'nombre_producto' => 'Clavo',
        ]);

        Producto::create([
            'bodega_id' => '1',
            'categoria_id' => '1',
            'total' => 200000,
            'cantidad_stock' => 10,
            'precio_unitario' => 20000,
            'nombre_producto' => 'Destornillador',
        ]);

        Producto::create([
            'bodega_id' => '1',
            'categoria_id' => '1',
            'total' => 150000,
            'cantidad_stock' => 15,
            'precio_unitario' => 10000,
            'nombre_producto' => 'Martillo',
        ]);

        Producto::create([
            'bodega_id' => '1',
            'categoria_id' => '1',
            'total' => 300000,
            'cantidad_stock' => 20,
            'precio_unitario' => 15000,
            'nombre_producto' => 'Sierra',
        ]);

        Producto::create([
            'bodega_id' => '1',
            'categoria_id' => '1',
            'total' => 250000,
            'cantidad_stock' => 25,
            'precio_unitario' => 10000,
            'nombre_producto' => 'Llave Inglesa',
        ]);

    }
}
