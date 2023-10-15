<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    function Create(){return View('vistas.empleado.create');}
    function Update(){return View('vistas.empleado.update');}
    function List(){return View('vistas.empleado.list');}
    function Details(){return View('vistas.empleado.details');}
}
