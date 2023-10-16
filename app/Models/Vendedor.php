<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = 'vendedores'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'apellido',
        'rut',
        'correo',
        'telefono',
        'estadolaboral',
    ];
}
