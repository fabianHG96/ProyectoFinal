<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{

function ShowNewEmpleado(){
    return View('vistas.empleado.create');
}

    function CreateNewEmpleado(Request $request){

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'lastname' => 'required',
            'rut' => 'required|unique:empleados',
            'email' => 'required|email|unique:empleados',
            'direccion' => 'required',
            'Fcontratacion' => 'required|date',
            'cargo' => 'required',
            'salario' => 'required',
            'estado_laboral' => 'required',
            'horario' => 'required',
            'Ftermino' => 'nullable|date',
        ]);
        Empleado::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'lastname' => $request->lastname,
            'rut' => $request->rut,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'Fcontratacion' => $request->Fcontratacion,
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'estado_laboral' => $request->estado_laboral,
            'horario' => $request->horario,
            'Ftermino' => $request->Ftermino,
        ]);

        return redirect()->route('ListEmpleado')->with('success', 'Empleado creado exitosamente');

        }


    function Update(){return View('vistas.empleado.update');}
    function List(){return View('vistas.empleado.list');}
    function Details(){return View('vistas.empleado.details');}
}
