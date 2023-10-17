<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteEmpresa;
use Illuminate\Support\Facades\DB;

class ClienteEmpresaController extends Controller
{
    public function showNewClienteEmpresa()
    {
        return view('vistas.clienteempresa.create');
    }

    public function createNewClienteEmpresa(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'rut' => 'required|unique:cliente_empresas',
            'pais' => 'required',
            'region' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        ClienteEmpresa::create([
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('ListClienteEmpresa')->with('success', 'Cliente Empresa creado exitosamente');
    }
    public function update()
    {
        return view('vistas.clienteempresa.update');
    }

    public function list(){
        $clienteempresa = Clienteempresa::all();
        return view('vistas.clienteempresa.list', ['mostrarcliente_empresas' => $clienteempresa]);
    }

    public function details()
    {
        return view('vistas.clienteempresa.details');
    }

    public function delete($id) {
        $clienteempresa = ClienteEmpresa::find($id);

        if (!$clienteempresa) {
            return redirect()->route('ListClienteEmpresa')->with('error', 'El cliente de la empresa no existe.');
        }

        // Usar DB::transaction para asegurarse de que El operación sea exitosa
        DB::transaction(function () use ($clienteempresa) {
            // Eliminar El clienteempresa de forma suave
            $clienteempresa->delete();
        });

        return redirect()->route('ListClienteEmpresa')->with('success', 'El cliente de la empresa ha sido eliminada de forma suave.');
    }
}
