<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orden_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orden_de_compra_id'); // Cambiado a orden_de_compra_id
            $table->unsignedBigInteger('producto_id'); // Asumiendo que esta es la referencia a productos
            $table->string('nombre_producto');
            $table->integer('cantidad');
            $table->decimal('monto', 8, 2);
            $table->decimal('total', 8, 2);
            $table->foreign('orden_de_compra_id')->references('id')->on('ordenes_de_compra');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_producto');
    }
};
