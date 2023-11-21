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
            'nombre' => 'required|string|min:2|max:255', // Ajustado: Longitud mínima y máxima para el nombre
            'rut' => 'required|unique:empresas|string|min:7|max:20', // Ajustado: Longitud mínima y máxima para el rut
            'pais' => 'required|string|min:2|max:255', // Ajustado: Longitud mínima y máxima para el país
            'region' => 'required|string|min:2|max:255', // Ajustado: Longitud mínima y máxima para la región
            'direccion' => 'required|string|min:5|max:255', // Ajustado: Longitud mínima y máxima para la dirección
            'rubro' => 'required|string|min:2|max:255', // Ajustado: Longitud mínima y máxima para el rubro
            'Ffundacion' => 'required|date',
            'email' => 'required|email|unique:empresas|string|min:5|max:255', // Ajustado: Longitud mínima y máxima para el email
            'telefono' => 'required|string|min:9|max:20', // Ajustado: Longitud mínima y máxima para el teléfono
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El valor del nombre debe ser una cadena de texto.',
            'nombre.min' => 'La longitud mínima para el nombre es de 2 caracteres.',
            'nombre.max' => 'La longitud máxima para el nombre es de 255 caracteres.',
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.unique' => 'El rut ya está registrado.',
            'rut.string' => 'El valor del rut debe ser una cadena de texto.',
            'rut.min' => 'La longitud mínima para el rut es de 7 caracteres.',
            'rut.max' => 'La longitud máxima para el rut es de 20 caracteres.',
            'pais.required' => 'El campo país es obligatorio.',
            'pais.string' => 'El valor del país debe ser una cadena de texto.',
            'pais.min' => 'La longitud mínima para el país es de 2 caracteres.',
            'pais.max' => 'La longitud máxima para el país es de 255 caracteres.',
            'region.required' => 'El campo región es obligatorio.',
            'region.string' => 'El valor de la región debe ser una cadena de texto.',
            'region.min' => 'La longitud mínima para la región es de 2 caracteres.',
            'region.max' => 'La longitud máxima para la región es de 255 caracteres.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El valor de la dirección debe ser una cadena de texto.',
            'direccion.min' => 'La longitud mínima para la dirección es de 5 caracteres.',
            'direccion.max' => 'La longitud máxima para la dirección es de 255 caracteres.',
            'rubro.required' => 'El campo rubro es obligatorio.',
            'rubro.string' => 'El valor del rubro debe ser una cadena de texto.',
            'rubro.min' => 'La longitud mínima para el rubro es de 2 caracteres.',
            'rubro.max' => 'La longitud máxima para el rubro es de 255 caracteres.',
            'Ffundacion.required' => 'El campo Ffundacion es obligatorio.',
            'Ffundacion.date' => 'El campo Ffundacion debe ser una fecha válida.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'email.string' => 'El valor del email debe ser una cadena de texto.',
            'email.min' => 'La longitud mínima para el email es de 5 caracteres.',
            'email.max' => 'La longitud máxima para el email es de 255 caracteres.',
            'telefono.required' => 'El campo telefono es obligatorio.',
            'telefono.string' => 'El valor del telefono debe ser una cadena de texto.',
            'telefono.min' => 'La longitud mínima para el teléfono es de 9 caracteres.',
            'telefono.max' => 'La longitud máxima para el teléfono es de 20 caracteres.',
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

    public function list(){
        $empresa = Empresa::all();
        return view('vistas.empresa.list', ['mostrarempresa' => $empresa]);
    }

    public function Details($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('ListEmpresa')->with('error', 'Empresa no encontrada');
        }

        return view('vistas.Empresa.details', ['empresa' => $empresa]);
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

    //////////////////////////////////

    public function showUpdateEmpresa($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('ListEmpresa')->with('error', 'Empresa no encontrada');
        }

        return view('vistas.Empresa.update', ['empresa' => $empresa]);
    }


    function Update(Request $request, $id){

        $request->validate([

            'nombre' =>  'required',
            'rut' =>  'required',
            'pais' =>  'required',
            'region' =>  'required',
            'rubro' =>  'required',
            'Ffundacion' =>  'required',
            'email' =>  'required',
            'telefono' =>  'required',
        ]);

        // Obtener la Empresa que se desea actualizar por su ID
        $Empresa = Empresa::find($id);

        // Verificar si se encontró la Empresa
        if (!$Empresa) {
            return redirect()->route('ListEmpresa')->with('error', 'Empresa no encontrada');
        }

        // Actualizar los atributos de la Empresa con los valores del formulario
        $Empresa->update([
            'direccion' => $request->direccion,
            'capacidad' => $request->capacidad,
            'stock' => $request->stock,
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'rubro' => $request->rubro,
            'Ffundacion' => $request->Ffundacion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('ListEmpresa')->with('success', 'Empresa actualizada exitosamente');
    }
}
