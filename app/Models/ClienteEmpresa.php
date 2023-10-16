<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteEmpresa extends Model
{
    use HasFactory;
    protected $table = 'cliente_empresas'; // Asegúrate de que coincida con el nombre de la tabla en la base de datos
    protected $fillable = ['nombre', 'rut', 'pais', 'region', 'direccion', 'email', 'telefono'];
}
