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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_factura')->nullable();
            $table->string('nombre_archivo')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->string('nombre_empresa')->nullable();
            $table->string('rut')->nullable();
            $table->string('giro')->nullable();
            $table->string('nombre_producto')->nullable();
            $table->decimal('monto_neto', 10, 2)->nullable();
            $table->decimal('iva', 10, 2)->nullable();
            $table->decimal('impuesto_adicional', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->binary('pdf_contenido', 4294967295)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');

    }
};
