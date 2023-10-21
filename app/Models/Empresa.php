<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'nombre',
        'rut',
        'pais',
        'region',
        'direccion',
        'rubro',
        'Ffundacion',
        'email',
        'telefono'
    ];

    public function bodega() {
        return $this->hasMany(Bodega::class);
    }
    public function empleado() {
        return $this->hasMany(Empleado::class);
    }
    public function clienteEmpresa() {
        return $this->hasMany(ClienteEmpresa::class);
    }
    public function usuarios() {
        return $this->hasMany(User::class);
    }
}
