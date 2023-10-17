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
        'proveedor_id',
    ];

    public function ordenesDeCompra() {
        return $this->hasMany(OrdenDeCompra::class);
    }
    public function proveedor() {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
