<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    function Create(){return View('vistas.persona.create');}
    function Update(){return View('vistas.persona.update');}
    function List(){return View('vistas.persona.list');}
    function Details(){return View('vistas.persona.details');}
}
