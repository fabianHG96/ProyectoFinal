<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Bodega;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpleadoController extends Controller
{
    use SoftDeletes;

function ShowNewEmpleado(){
    $cargos = Cargo::all(); // o cualquier método que utilices para obtener las cargos
    return view('vistas.empleado.create',compact('cargos'));
}

    function CreateNewEmpleado(Request $request){

        $request->validate([
            'empresa_id' => 'required|exists:empleados,id',
            'cargo_id' => 'required|exists:cargos,id',
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'required|string|max:255',
            'rut' => 'required|unique:empleados|string|max:20',
            'email' => 'required|email|unique:empleados|string|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'Fcontratacion' => 'required|date',
            'salario' => 'required|numeric',
            'estado_laboral' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'Ftermino' => 'nullable|date',
        ], [
            'empresa_id.required' => 'El campo empresa_id es obligatorio.',
            'empresa_id.exists' => 'La empresa especificada no existe.',
            'cargo_id.required' => 'El campo cargo_id es obligatorio.',
            'cargo_id.exists' => 'El cargo especificado no existe.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El valor del nombre debe ser una cadena de texto.',
            'nombre.max' => 'La longitud máxima para el nombre es de 255 caracteres.',
            'apellido_p.required' => 'El campo apellido_p es obligatorio.',
            'apellido_p.string' => 'El valor del apellido_p debe ser una cadena de texto.',
            'apellido_p.max' => 'La longitud máxima para el apellido_p es de 255 caracteres.',
            'apellido_m.required' => 'El campo apellido_m es obligatorio.',
            'apellido_m.string' => 'El valor del apellido_m debe ser una cadena de texto.',
            'apellido_m.max' => 'La longitud máxima para el apellido_m es de 255 caracteres.',
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.unique' => 'El rut ya está registrado.',
            'rut.string' => 'El valor del rut debe ser una cadena de texto.',
            'rut.max' => 'La longitud máxima para el rut es de 20 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'email.string' => 'El valor del email debe ser una cadena de texto.',
            'email.max' => 'La longitud máxima para el email es de 255 caracteres.',
            'telefono.required' => 'El campo telefono es obligatorio.',
            'telefono.unique' => 'El teléfono ya está registrado.',
            'telefono.string' => 'El valor del telefono debe ser una cadena de texto.',
            'telefono.max' => 'La longitud máxima para el telefono es de 20 caracteres.',
            'direccion.required' => 'El campo direccion es obligatorio.',
            'direccion.string' => 'El valor de la direccion debe ser una cadena de texto.',
            'direccion.max' => 'La longitud máxima para la direccion es de 255 caracteres.',
            'Fcontratacion.required' => 'El campo Fcontratacion es obligatorio.',
            'Fcontratacion.date' => 'El campo Fcontratacion debe ser una fecha válida.',
            'salario.required' => 'El campo salario es obligatorio.',
            'salario.numeric' => 'El campo salario debe ser un valor numérico.',
            'estado_laboral.required' => 'El campo estado_laboral es obligatorio.',
            'estado_laboral.string' => 'El valor del estado_laboral debe ser una cadena de texto.',
            'estado_laboral.max' => 'La longitud máxima para el estado_laboral es de 255 caracteres.',
            'horario.required' => 'El campo horario es obligatorio.',
            'horario.string' => 'El valor del horario debe ser una cadena de texto.',
            'horario.max' => 'La longitud máxima para el horario es de 255 caracteres.',
            'Ftermino.date' => 'El campo Ftermino debe ser una fecha válida.',
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

        public function Details($id)
        {
            $empleado = Empleado::find($id);
            $cargos = Cargo::all(); // Obtener todos los cargos

            if (!$empleado) {
                return redirect()->route('ListEmpleado')->with('error', 'Empleado no encontrada');
            }

            return view('vistas.empleado.details', ['empleado' => $empleado, 'cargos' => $cargos] , compact('empleado', 'cargos'));
        }
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
