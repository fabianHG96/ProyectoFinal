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
        Schema::create('ordenes_de_compra', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_solicitud');
            $table->date('fecha_termino');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('vendedor_id');
            $table->string('nombre_producto');
            $table->integer('cantidad');
            $table->decimal('monto', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_de_compra');
    }
};
