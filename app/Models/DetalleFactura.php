<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
 /* The code you provided is a PHP class definition for a model called "DetalleFactura" in the
 "App\Models" namespace. */
    use HasFactory;

    protected $table = 'detalle_factura'; // Nombre de la tabla
    protected $fillable = [
        'factura_id',
        'cliente_id',
        'nombre_cliente',
        'rut_cliente',
        'fecha_emision',
        'n_factura',
        'monto_neto',
        'iva',
        'total_factura',
        // Otros campos que desees llenar
    ];




    public function factura()
{
    return $this->belongsTo(Factura::class, 'factura_id');
}

public function cliente()
{
    return $this->belongsTo(Prodcuto::class, 'cliente_id');
}

}
