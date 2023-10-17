<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function showNewCategoria()
    {
        return view('vistas.categoria.create');
    }

    public function createNewBodega(Request $request)
    {
        $request->validate([
            'categoria' => 'required',

        ]);

        Categoria::create([
            'categoria' => $request->categoria,

        ]);

        return redirect()->route('ListCategoria')->with('success', 'Categoria creada exitosamente');
    }
    function Update(){return View('vistas.categoria.update');}
    function List(){return View('vistas.categoria.list');}
    function Details(){return View('vistas.categoria.details');}
}
