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
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->string('rut_cliente')->nullable();
            $table->string('fecha_emision')->nullable();
            $table->decimal('monto_neto', 10, 2)->nullable();
            $table->decimal('iva', 10, 2)->nullable();
            $table->decimal('total_factura', 10, 2)->nullable();
            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->foreign('cliente_id')->references('id')->on('cliente_empresas');
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
