<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Bodega;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{

function ShowNewEmpleado(){
    $cargos = Cargo::all(); // o cualquier método que utilices para obtener las cargos
    return view('vistas.empleado.create',compact('cargos'));
}

    function CreateNewEmpleado(Request $request){

        $request->validate([
            'empresa_id' => 'required|exists:empleados,id',
            'cargo_id' => 'required|exists:cargos,id',
            'nombre' => 'required:empleados',
            'apellido_p' => 'required:empleados',
            'apellido_m' => 'required:empleados',
            'rut' => 'required|unique:empleados',
            'email' => 'required|email|unique:empleados',
            'telefono' => 'required|unique:empleados',
            'direccion' => 'required:empleados',
            'Fcontratacion' => 'required|date:empleados',
            'salario' => 'required:empleados',
            'estado_laboral' => 'required:empleados',
            'horario' => 'required:empleados',
            'Ftermino' => 'nullable|date:empleados',
        ]);


        Empleado::create([
            'empresa_id' => $request->empresa_id,
            'cargo_id' => $request->cargo_id,
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'rut' => $request->rut,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'Fcontratacion' => $request->Fcontratacion,
            'salario' => $request->salario,
            'estado_laboral' => $request->estado_laboral,
            'horario' => $request->horario,
            'Ftermino' => $request->Ftermino,
        ]);

        return redirect()->route('ListEmpleado')->with('success', 'Empleado creado exitosamente');
        }

    function Details(){return View('vistas.empleado.details');}
    public function list(){
        $empleado = Empleado::all();
        return view('vistas.empleado.list', ['mostrarempleado' => $empleado]);
    }

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

    /////

    public function showUpdateEmpleado($id)
    {
        $empleado = Empleado::find($id);
        $cargos = Cargo::all(); // Obtener todos los cargos

        if (!$empleado) {
            return redirect()->route('ListEmpleado')->with('error', 'Empleado no encontrada');
        }

        return view('vistas.empleado.update', ['empleado' => $empleado, 'cargos' => $cargos]);
    }


    function Update(Request $request, $id){

        $request->validate([
            'empresa_id' => 'required',
            'cargo_id' => 'required',
            'nombre' => 'required',
            'apellido_p' => 'required',
            'apellido_m' => 'required',
            'rut' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'Fcontratacion' => 'required|date',
            'salario' => 'required',
            'estado_laboral' => 'required',
            'horario' => 'required',
            'Ftermino' => 'nullable|date',
        ]);

        // Obtener la Empresa que se desea actualizar por su ID
        $Empleado = Empleado::find($id);

        // Verificar si se encontró la Empleado
        if (!$Empleado) {
            return redirect()->route('ListEmpleado')->with('error', 'Empleado no encontrada');
        }

        // Actualizar los atributos de la Empleado con los valores del formulario
        $Empleado->update([
            'empresa_id' => $request->empresa_id,
            'bodega_id' => $request->bodega_id,
            'cargo_id' => $request->cargo_id,
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'rut' => $request->rut,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'Fcontratacion' => $request->Fcontratacion,
            'salario' => $request->salario,
            'estado_laboral' => $request->estado_laboral,
            'horario' => $request->horario,
            'Ftermino' => $request->Ftermino,
        ]);

        return redirect()->route('ListEmpleado')->with('success', 'Empleado actualizada exitosamente');
    }
}
