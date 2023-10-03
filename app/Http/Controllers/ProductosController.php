<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
        function Create(){
            return View('vistas.producto.create');
         }
         function Update(){
            return View('vistas.producto.update');
         }
         function List(){
            return View('vistas.producto.list');
         }
         function Details(){
            return View('vistas.producto.details');
         }
}
