<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;
    protected $table = 'bodegas'; // Asegúrate de que coincida con el nombre de la tabla en la base de datos
    protected $fillable = ['empresa_id','pais','region','direccion', 'capacidad', 'stock'];



    public function productos() {
        return $this->hasMany(Producto::class);
    }
    public function empleado() {
        return $this->hasMany(Empleado::class);
    }

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

}
