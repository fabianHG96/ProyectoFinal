<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = 'vendedor';

    protected $fillable = [
        'nombre',
        'apellido',
        'rut',
        'direccion',
        'email',
        'telefono',
        'estado_laboral',
    ];
}
