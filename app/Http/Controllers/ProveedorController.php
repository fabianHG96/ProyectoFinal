<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    function Create(){return View('vistas.proveedor.create');}
    function Update(){return View('vistas.proveedor.update');}
    function List(){return View('vistas.proveedor.list');}
    function Details(){return View('vistas.proveedor.details');}
}
