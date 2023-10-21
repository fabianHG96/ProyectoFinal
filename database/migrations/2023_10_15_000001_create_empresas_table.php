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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique;
            $table->string('rut')->unique(); // Agregamos 'unique' a la columna 'rut'
            $table->string('pais');
            $table->string('region');
            $table->string('direccion');
            $table->string('rubro');
            $table->date('Ffundacion');
            $table->string('email')->unique(); // Agregamos 'unique' a la columna 'email'
            $table->string('telefono')->unique;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
