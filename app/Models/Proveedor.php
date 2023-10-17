<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedor'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'rut',
        'pais',
        'region',
        'direccion',
        'telefono',
        'email',
        'rubro',
    ];

    public function vendedores() {
        return $this->hasMany(Vendedor::class);
    }
}
