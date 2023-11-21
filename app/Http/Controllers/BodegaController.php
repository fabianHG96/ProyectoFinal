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
            'pais' => 'required|string|min:2',
            'region' => 'required|string|min:2',
            'direccion' => 'required|string|min:2',
            'capacidad' => 'required|integer|min:1',
            'stock' => 'required|integer|min:1',
        ], [
            'empresa_id.required' => 'El campo empresa_id es obligatorio.',
            'empresa_id.exists' => 'La empresa especificada no existe.',
            'pais.required' => 'El campo país es obligatorio.',
            'pais.string' => 'El valor del país debe ser una cadena de texto.',
            'pais.min' => 'La longitud mínima para el país es de 2 caracteres.',
            'region.required' => 'El campo región es obligatorio.',
            'region.string' => 'El valor de la región debe ser una cadena de texto.',
            'region.min' => 'La longitud mínima para la región es de 2 caracteres.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El valor de la dirección debe ser una cadena de texto.',
            'direccion.min' => 'La longitud mínima para la dirección es de 2 caracteres.',
            'capacidad.required' => 'El campo capacidad es obligatorio.',
            'capacidad.integer' => 'La capacidad debe ser un número entero.',
            'capacidad.min' => 'La capacidad debe ser al menos 1.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock debe ser al menos 1.',
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
    public function Details($id)
    {
    // Obtener la bodega que se desea actualizar por su ID
    $bodega = Bodega::find($id);

    // Verificar si se encontró la bodega
         if (!$bodega)  {
        return redirect()->route('ListBodega')->with('error', 'Bodega no encontrada');
        }

    // Pasar la bodega a la vista de actualización
    return view('vistas.bodega.details', ['bodega' => $bodega]);
    }








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
