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
        Schema::create('Empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('rut')->unique(); // Agregamos 'unique' a la columna 'rut'
            $table->string('email')->unique();
            $table->string('telefono'); // Agregamos 'unique' a la columna 'email'
            $table->string('direccion');
            $table->date('Fcontratacion');
            $table->string('cargo');
            $table->string('salario');
            $table->string('estado_laboral');
            $table->string('horario');
            $table->date('Ftermino')->nullable();
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
