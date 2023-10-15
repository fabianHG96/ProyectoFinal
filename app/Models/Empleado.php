<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';

    protected $fillable = [
        'name',
        'surname',
        'lastname',
        'rut',
        'email',
        'direccion',
        'Fcontratacion',
        'cargo',
        'salario',
        'estado_laboral',
        'horario',
        'Ftermino',
    ];
}
