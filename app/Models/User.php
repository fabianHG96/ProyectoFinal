<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    use HasFactory;

    protected $table = 'users';

    protected $fillable = ['name', 'surname', 'email', 'password', 'remember_token'];
}
