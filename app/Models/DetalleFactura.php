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
        'codigo',
        'descripcion',
        'cantidad',
        'precio',
        'total_item',
        'monto_neto',
        'iva',
        'total_factura',
        // Otros campos que desees llenar
    ];




    public function factura()
{
    return $this->belongsTo(Factura::class, 'factura_id');
}

}
