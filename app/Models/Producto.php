<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $fillable = [
        'bodega_id',
        'categoria_id',
        'cantidad_stock',
        'precio_unitario',
        'nombre_producto',
        'total',
    ];


    public function bodega() {
        return $this->belongsTo(Bodega::class, 'bodega_id');
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
