<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    protected $table = 'detalle_factura'; // Nombre de la tabla
    protected $fillable = [
        'factura_id',
        'nombre_cliente',
        'rut_cliente',
        'fecha_emision',
        'detalle_productos',
        'monto_neto',
        'iva',
        'total_factura',
        // Otros campos que desees llenar
    ];

    protected $casts = [
        'detalle_productos' => 'array', // Si el detalle de productos es un JSON, de lo contrario, ajusta según sea necesario
    ];


    public function factura()
{
    return $this->belongsTo(Factura::class, 'factura_id');
}

}
