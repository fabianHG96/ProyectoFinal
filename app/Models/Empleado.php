<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'rut',
        'email',
        'telefono',
        'direccion',
        'Fcontratacion',
        'cargo',
        'salario',
        'estado_laboral',
        'horario',
        'Ftermino',
    ];
}
