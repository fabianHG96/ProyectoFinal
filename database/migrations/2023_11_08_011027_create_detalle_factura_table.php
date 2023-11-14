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
            $table->unsignedBigInteger('factura_id');
            $table->string('nombre_cliente')->nullable();
            $table->string('rut_cliente')->nullable();
            $table->string('fecha_emision')->nullable();
            $table->json('detalle_productos')->nullable(); // Cambiado a tipo JSON
            $table->string('monto_neto')->nullable();
            $table->string('iva')->nullable();
            $table->string('total_factura')->nullable();
            $table->foreign('factura_id')->references('id')->on('facturas');
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
