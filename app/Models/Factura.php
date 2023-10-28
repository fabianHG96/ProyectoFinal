<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'facturas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'numero_factura',
        'nombre_archivo',
        'fecha_emision',
        'nombre_empresa',
        'rut',
        'giro',
        'nombre_producto',
        'monto_neto',
        'iva',
        'impuesto_adicional',
        'total',
        'pdf_contenido', // Añade este campo si deseas almacenar el contenido binario del archivo PDF
    ];
}
