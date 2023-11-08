<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    protected $table = 'detalle_factura'; // Nombre de la tabla
    protected $fillable = [
        'numero_factura',
        'fecha_emision',
        'nombre_empresa',
        'rut',
        'giro',
        'nombre_producto',
        'monto_neto',
        'iva',
        'impuesto_adicional',
        'total',
        // Otros campos que desees llenar
    ];

    // Si vas a almacenar el contenido del PDF original en la base de datos, asegúrate de agregarlo aquí.
    // Ejemplo:
    protected $casts = [
        'pdf_contenido' => 'binary', // El nombre del campo debe coincidir con el de la base de datos
    ];

    public function factura()
{
    return $this->belongsTo(Factura::class, 'factura_id');
}

}
