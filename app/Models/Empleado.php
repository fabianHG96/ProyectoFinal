<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'empleados';

    protected $fillable = [
        'empresa_id',
        'bodega_id',
        'cargo_id',
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


    public function ordendecompra() {
        return $this->hasMany(OrdenDeCompra::class);
    }


    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
    public function bodega() {
        return $this->belongsTo(Bodega::class, 'bodega_id');
    }
    public function cargos() {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
}
