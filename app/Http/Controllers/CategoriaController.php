<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function showNewCategoria()
    {
        return view('vistas.categoria.create');
    }

    public function createNewCategoria(Request $request)
    {
        $request->validate([
            'categoria' => 'required',

        ]);

        Categoria::create([
            'categoria' => $request->categoria,

        ]);

        return redirect()->route('ListCategoria')->with('success', 'Categoria creada exitosamente');
    }


    public function showUpdateCategoria($id)
    {
    // Obtener la bodega que se desea actualizar por su ID
    $categoria = Categoria::find($id);

    // Verificar si se encontró la bodega
         if (!$categoria)  {
        return redirect()->route('ListCategoria')->with('error', 'Bodega no encontrada');
        }

    // Pasar la bodega a la vista de actualización
    return view('vistas.categoria.update', ['categoria' => $categoria]);
    }

    function Update(Request $request, $id){

        $request->validate([
            'categoria' => 'required',

        ]);


        $categoria = Categoria::find($id);

        if (!$categoria) {
            return redirect()->route('ListCtaegoria')->with('error', 'Categoria no encontrada');
        }

        // Actualizar los atributos de la Categoria con los valores del formulario
        $categoria->update([
            'categoria' => $request->categoria,

        ]);

        return redirect()->route('ListCategoria')->with('success', 'Categoria actualizada exitosamente');
    }

    function List(){
        $categoria = Categoria::all();
        return view('vistas.categoria.list', ['mostrarcategoria' => $categoria]);
    }

    public function delete($id) {
        $categoria = categoria::find($id);

        if (!$categoria) {
            return redirect()->route('Listcategoria')->with('error', 'La categoria no existe.');
        }

        // Usar DB::transaction para asegurarse de que la operación sea exitosa
        DB::transaction(function () use ($categoria) {
            // Eliminar la categoria de forma suave
            $categoria->delete();
        });

        return redirect()->route('Listcategoria')->with('success', 'La categoria ha sido eliminada de forma suave.');
    }


    public function Details($id)
    {
    // Obtener la bodega que se desea actualizar por su ID
    $categoria = Categoria::find($id);

    // Verificar si se encontró la bodega
         if (!$categoria)  {
        return redirect()->route('ListCategoria')->with('error', 'Bodega no encontrada');
        }

    // Pasar la bodega a la vista de actualización
    return view('vistas.categoria.details', ['categoria' => $categoria]);
    }

}
