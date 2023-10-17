<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{

function ShowNewEmpleado(){
    return View('vistas.empleado.create');
}

    function CreateNewEmpleado(Request $request){

        $request->validate([
            'nombre' => 'required:empleados',
            'apellido_p' => 'required:empleados',
            'apellido_m' => 'required:empleados',
            'rut' => 'required|unique:empleados',
            'email' => 'required|email|unique:empleados',
            'telefono' => 'required|email|unique:empleados',
            'direccion' => 'required:empleados',
            'Fcontratacion' => 'required|date:empleados',
            'cargo' => 'required:empleados',
            'salario' => 'required:empleados',
            'estado_laboral' => 'required:empleados',
            'horario' => 'required:empleados',
            'Ftermino' => 'nullable|date:empleados',
        ]);
        Empleado::create([
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'rut' => $request->rut,
            'email' => $request->email,
            'telefono' => $request->telefono,
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
    public function list(){
        $empleado = Empleado::all();
        return view('vistas.empleado.list', ['mostrarempleado' => $empleado]);
    }
    function Details(){return View('vistas.empleado.details');}

    public function delete($id) {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return redirect()->route('ListEmpleado')->with('error', 'La empleado no existe.');
        }

        // Usar DB::transaction para asegurarse de que la operación sea exitosa
        DB::transaction(function () use ($empleado) {
            // Eliminar la empleado de forma suave
            $empleado->delete();
        });

        return redirect()->route('ListEmpleado')->with('success', 'La empleado ha sido eliminada de forma suave.');
    }
}
