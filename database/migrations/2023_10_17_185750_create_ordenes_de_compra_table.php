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
            $table->string('nombre_proveedor');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('vendedor_id');
            $table->unsignedBigInteger('empleado_id');
            $table->string('nombre_producto');
            $table->string('estado')->default('activo');
            $table->integer('cantidad');
            $table->decimal('monto', 10, 0);
            $table->decimal('total', 10, 0);
            $table->foreign('proveedor_id')->references('id')->on('proveedor');
            $table->foreign('vendedor_id')->references('id')->on('vendedor');
            $table->foreign('empleado_id')->references('id')->on('empleados');

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
