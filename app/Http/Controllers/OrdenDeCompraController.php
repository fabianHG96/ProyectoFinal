<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdenDeCompraController extends Controller
{
    function Create(){
        return View('vistas.ordendecompra.create');
     }
     function Update(){
        return View('vistas.ordendecompra.update');
     }
     function List(){
        return View('vistas.ordendecompra.list');
     }
     function Details(){
        return View('vistas.ordendecompra.details');
     }

}
