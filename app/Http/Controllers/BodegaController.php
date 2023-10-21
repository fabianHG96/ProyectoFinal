<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;
use Illuminate\Support\Facades\DB;

class BodegaController extends Controller
{
    public function showNewBodega()
    {
        return view('vistas.bodega.create');
    }

    public function createNewBodega(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresa,id',
            'direccion' => 'required',
            'capacidad' => 'required',
            'stock' => 'required',
        ]);

        Bodega::create([
            'empresa_id' => $request->empresa_id,
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

    public function delete($id) {
        $bodega = Bodega::find($id);

        if (!$bodega) {
            return redirect()->route('ListBodega')->with('error', 'La bodega no existe.');
        }

        // Usar DB::transaction para asegurarse de que la operación sea exitosa
        DB::transaction(function () use ($bodega) {
            // Eliminar la bodega de forma suave
            $bodega->delete();
        });

        return redirect()->route('ListBodega')->with('success', 'La bodega ha sido eliminada de forma suave.');
    }
}
