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

    public function update()
    {
        return view('vistas.empresa.update');
    }

    public function list(){
        $empresa = Empresa::all();
        return view('vistas.empresa.list', ['mostrarempresa' => $empresa]);
    }

    public function details()
    {
        return view('vistas.empresa.list');
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
}
