<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendedor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'vendedor';

    protected $fillable = [
        'nombre',
        'apellido',
        'rut',
        'direccion',
        'email',
        'telefono',
        'estado_laboral',
        'proveedor_id',
    ];

    public function ordenDeCompra() {
        return $this->hasMany(OrdenDeCompra::class);
    }
    public function proveedor() {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
