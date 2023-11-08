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
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->id();
            $table->string('numero_factura');
            $table->date('fecha_emision');
            $table->string('nombre_empresa');
            $table->string('rut');
            $table->string('giro');
            $table->string('nombre_producto');
            $table->decimal('monto_neto', 10, 2);
            $table->decimal('iva', 10, 2);
            $table->decimal('impuesto_adicional', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_factura');
    }
};
