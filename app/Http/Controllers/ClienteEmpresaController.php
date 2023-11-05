<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteEmpresa;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;

class ClienteEmpresaController extends Controller
{
    public function showNewClienteEmpresa()
    {
        $empresas = Empresa::all();
        return view('vistas.clienteempresa.create');
    }

    public function createNewClienteEmpresa(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'nombre' => 'required',
            'rut' => 'required|unique:cliente_empresas',
            'pais' => 'required',
            'region' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        ClienteEmpresa::create([
            'empresa_id' => $request->empresa_id,
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

    public function showUpdateClienteEmpresa($id)
    {
        $clienteEmpresa = ClienteEmpresa::find($id);

        if (!$clienteEmpresa) {
            return redirect()->route('ListClienteEmpresa')->with('error', 'Cliente de la empresa no encontrado');
        }

        return view('vistas.clienteempresa.update', ['clienteEmpresa' => $clienteEmpresa]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'rut' => 'required|unique:cliente_empresas,rut,' . $id,
            'pais' => 'required',
            'region' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        // Obtener el cliente de la empresa que se desea actualizar por su ID
        $clienteEmpresa = ClienteEmpresa::find($id);

        if (!$clienteEmpresa) {
            return redirect()->route('ListClienteEmpresa')->with('error', 'Cliente de la empresa no encontrado');
        }

        $clienteEmpresa->update([
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('ListClienteEmpresa')->with('success', 'Cliente de la empresa actualizado exitosamente');
    }

    public function list(){
        $clienteempresa = ClienteEmpresa::all();
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
