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
        Schema::create('cliente_empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string('nombre')->unique;
            $table->string('rut')->unique(); // Agregar restricción 'unique' al campo 'rut'
            $table->string('pais');
            $table->string('region');
            $table->string('direccion');
            $table->string('email')->unique(); // Agregar restricción 'unique' al campo 'email'
            $table->string('telefono')->unique;
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cliente_empresas');
    }
};
