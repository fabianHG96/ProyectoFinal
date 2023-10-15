<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{

    function ShowNewVendedor(){
        return View('vistas.vendedor.create');
    }

        function CreateNewVendedor(Request $request){

            $request->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'rut' => 'required|unique:vendedor',
                'email' => 'required|email|unique:vendedor',
                'telefono' => 'required',
                'estado_laboral' => 'required',
            ]);
            Vendedor::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'rut' => $request->rut,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'estado_laboral' => $request->estado_laboral,
            ]);

            return redirect()->route('ListVendedor')->with('success', 'Vendedor creado exitosamente');

            }


        function Update(){return View('vistas.vendedor.update');}
        function List(){return View('vistas.vendedor.list');}
        function Details(){return View('vistas.vendedor.details');}
    }
