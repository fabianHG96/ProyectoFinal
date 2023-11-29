<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'facturas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre_archivo',
        'ruta_archivo',
        'n_factura',
        'identificador_unico'
    ];

    public function detalleFacturas()
{
    return $this->hasMany(DetalleFactura::class, 'factura_id');
}
}
