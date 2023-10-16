<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;

class BodegaController extends Controller
{
    public function showNewBodega()
    {
        return view('vistas.bodega.create');
    }

    public function createNewBodega(Request $request)
    {
        $request->validate([
            'direccion' => 'required',
            'capacidad' => 'required',
            'stock' => 'required',
        ]);

        Bodega::create([
            'direccion' => $request->direccion,
            'capacidad' => $request->capacidad,
            'stock' => $request->stock,
        ]);

        return redirect()->route('ListBodega')->with('success', 'Bodega creada exitosamente');
    }
    function Update(){return View('vistas.bodega.update');}
    function List(){return View('vistas.bodega.list');}
    function Details(){return View('vistas.bodega.details');}
}
