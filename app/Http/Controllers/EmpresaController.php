<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    public function showNewEmpresa()
    {
        return view('vistas.empresa.create');
    }

    public function createNewEmpresa(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'rut' => 'required|unique:empresas',
            'pais' => 'required',
            'region' => 'required',
            'direccion' => 'required',
            'rubro' => 'required',
            'Ffundacion' => 'required|date',
            'email' => 'required|email|unique:empresas',
            'telefono' => 'required',
        ]);

        Empresa::create([
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'rubro' => $request->rubro,
            'Ffundacion' => $request->Ffundacion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('ListEmpresa')->with('success', 'Empresa creada exitosamente');
    }

    public function list(){
        $empresa = Empresa::all();
        return view('vistas.empresa.list', ['mostrarempresa' => $empresa]);
    }

    public function Details($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('ListEmpresa')->with('error', 'Empresa no encontrada');
        }

        return view('vistas.Empresa.details', ['empresa' => $empresa]);
    }

    public function delete($id) {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('ListEmpresa')->with('error', 'La empresa no existe.');
        }

        // Usar DB::transaction para asegurarse de que la operación sea exitosa
        DB::transaction(function () use ($empresa) {
            // Eliminar la empresa de forma suave
            $empresa->delete();
        });

        return redirect()->route('ListEmpresa')->with('success', 'La empresa ha sido eliminada de forma suave.');
    }

    //////////////////////////////////

    public function showUpdateEmpresa($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('ListEmpresa')->with('error', 'Empresa no encontrada');
        }

        return view('vistas.Empresa.update', ['empresa' => $empresa]);
    }


    function Update(Request $request, $id){

        $request->validate([

            'nombre' =>  'required',
            'rut' =>  'required',
            'pais' =>  'required',
            'region' =>  'required',
            'rubro' =>  'required',
            'Ffundacion' =>  'required',
            'email' =>  'required',
            'telefono' =>  'required',
        ]);

        // Obtener la Empresa que se desea actualizar por su ID
        $Empresa = Empresa::find($id);

        // Verificar si se encontró la Empresa
        if (!$Empresa) {
            return redirect()->route('ListEmpresa')->with('error', 'Empresa no encontrada');
        }

        // Actualizar los atributos de la Empresa con los valores del formulario
        $Empresa->update([
            'direccion' => $request->direccion,
            'capacidad' => $request->capacidad,
            'stock' => $request->stock,
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'rubro' => $request->rubro,
            'Ffundacion' => $request->Ffundacion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('ListEmpresa')->with('success', 'Empresa actualizada exitosamente');
    }
}
