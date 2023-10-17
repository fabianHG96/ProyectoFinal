<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteEmpresa;

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
}
