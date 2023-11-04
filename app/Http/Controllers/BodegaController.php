<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;

class BodegaController extends Controller
{
    public function showNewBodega()
    {
        $empresas = Empresa::all();
        return view('vistas.bodega.create', compact('empresas'));
    }

    public function createNewBodega(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'pais' => 'required',
            'region' => 'required',
            'direccion' => 'required',
            'capacidad' => 'required',
            'stock' => 'required',
        ]);

        Bodega::create([
            'empresa_id' => $request->empresa_id,
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'capacidad' => $request->capacidad,
            'stock' => $request->stock,
        ]);

        return redirect()->route('ListBodega')->with('success', 'Bodega creada exitosamente');
    }

    public function showUpdateBodega($id)
    {
    // Obtener la bodega que se desea actualizar por su ID
    $bodega = Bodega::find($id);

    // Verificar si se encontró la bodega
         if (!$bodega)  {
        return redirect()->route('ListBodega')->with('error', 'Bodega no encontrada');
        }

    // Pasar la bodega a la vista de actualización
    return view('vistas.bodega.update', ['bodega' => $bodega]);
    }

    function Update(Request $request, $id){

        $request->validate([
            'pais' => 'required',
            'region' => 'required',
            'direccion' => 'required',
            'capacidad' => 'required',
            'stock' => 'required',
        ]);

        // Obtener la bodega que se desea actualizar por su ID
        $bodega = Bodega::find($id);

        // Verificar si se encontró la bodega
        if (!$bodega) {
            return redirect()->route('ListBodega')->with('error', 'Bodega no encontrada');
        }

        // Actualizar los atributos de la bodega con los valores del formulario
        $bodega->update([
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'capacidad' => $request->capacidad,
            'stock' => $request->stock,
        ]);

        return redirect()->route('ListBodega')->with('success', 'Bodega actualizada exitosamente');
    }






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
