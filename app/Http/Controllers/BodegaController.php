<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BodegaController extends Controller
{
    function Create(){return View('vistas.bodega.create');}
    function Update(){return View('vistas.bodega.update');}
    function List(){return View('vistas.bodega.list');}
    function Details(){return View('vistas.bodega.details');}
}
