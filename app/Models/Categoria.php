<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias'; // Asegúrate de que coincida con el nombre de la tabla en la base de datos
    protected $fillable = ['categoria'];
}
