<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;


class VendedorController extends Controller
{
    public function showNewVendedor()
    {
        return view('vistas.vendedor.create');
    }

    public function createNewVendedor(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'rut' => 'required|unique:vendedores',
            'correo' => 'required|email',
            'telefono' => 'required',
            'estadolaboral' => 'required',
        ]);

        Vendedor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'rut' => $request->rut,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'estadolaboral' => $request->estadolaboral,
        ]);

        return redirect()->route('ListVendedor')->with('success', 'Vendedor creado exitosamente');
    }
}
