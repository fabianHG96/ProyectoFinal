<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';

    protected $fillable = [
        'cargo',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
