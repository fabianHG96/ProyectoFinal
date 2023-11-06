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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bodega_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('nombre_producto');
            $table->integer('cantidad_stock');
            $table->decimal('precio_unitario', 10, 0);
            $table->decimal('total', 10, 0);
            $table->timestamps();
            $table->foreign('bodega_id')->references('id')->on('bodegas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
