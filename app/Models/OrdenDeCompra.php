<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenDeCompra extends Model
{
    use HasFactory;
    protected $table = 'ordenes_de_compra';

    protected $fillable = [
        'fecha_solicitud',
        'fecha_termino',
        'proveedor_id',
        'vendedor_id',
        'empleado_id',
        'nombre_producto',
        'estado',
        'cantidad',
        'monto',
        'total',
        'nombre_proveedor',


    ];



    public function vendedor() {
        return $this->belongsTo(Vendedor::class, 'vendedor_id');
    }

    public function proveedor() {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function empleado() {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function productos() {
        return $this->belongsToMany(Producto::class, 'orden_producto')
                    ->withPivot('nombre_producto', 'cantidad', 'monto', 'total');
    }
}
