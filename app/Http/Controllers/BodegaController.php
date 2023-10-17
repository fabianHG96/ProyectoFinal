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
    public function list(){
        $bodega = Bodega::all();
        return view('vistas.bodega.list', ['mostrarbodega' => $bodega]);
    }
    function Details(){return View('vistas.bodega.details');}
}
