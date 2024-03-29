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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('bodega_id')->nullable();
            $table->unsignedBigInteger('cargo_id');
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('rut')->unique(); // Agregamos 'unique' a la columna 'rut'
            $table->string('email')->unique();
            $table->string('telefono'); // Agregamos 'unique' a la columna 'email'
            $table->string('direccion');
            $table->date('Fcontratacion');
            $table->string('salario');
            $table->string('estado_laboral');
            $table->string('horario');
            $table->date('Ftermino')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('bodega_id')->references('id')->on('bodegas');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
