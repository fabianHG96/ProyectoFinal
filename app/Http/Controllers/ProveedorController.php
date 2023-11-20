<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    function showNewProveedor(){
        return view('vistas.proveedor.create');
    }

    function createNewProveedor(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:2|max:255', // Agregamos la longitud mínima y máxima
            'rut' => 'required|unique:proveedor|string|min:2|max:20', // Agregamos la longitud mínima y máxima
            'pais' => 'required|string|min:2|max:255', // Agregamos la longitud mínima y máxima
            'region' => 'required|string|min:2|max:255', // Agregamos la longitud mínima y máxima
            'direccion' => 'required|string|min:2|max:255', // Agregamos la longitud mínima y máxima
            'telefono' => 'required|string|min:2|max:20', // Agregamos la longitud mínima y máxima
            'email' => 'required|email|unique:proveedor|string|max:255', // Cambiamos 'empleados' por 'proveedor' y agregamos la longitud máxima
            'rubro' => 'required|string|min:2|max:255', // Agregamos la longitud mínima y máxima
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El valor de nombre debe ser una cadena de texto.',
            'nombre.min' => 'La longitud mínima para nombre es de 2 caracteres.',
            'nombre.max' => 'La longitud máxima para nombre es de 255 caracteres.',
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.unique' => 'El rut ya está registrado.',
            'rut.string' => 'El valor de rut debe ser una cadena de texto.',
            'rut.min' => 'La longitud mínima para rut es de 2 caracteres.',
            'rut.max' => 'La longitud máxima para rut es de 20 caracteres.',
            'pais.required' => 'El campo pais es obligatorio.',
            'pais.string' => 'El valor de pais debe ser una cadena de texto.',
            'pais.min' => 'La longitud mínima para pais es de 2 caracteres.',
            'pais.max' => 'La longitud máxima para pais es de 255 caracteres.',
            'region.required' => 'El campo region es obligatorio.',
            'region.string' => 'El valor de region debe ser una cadena de texto.',
            'region.min' => 'La longitud mínima para region es de 2 caracteres.',
            'region.max' => 'La longitud máxima para region es de 255 caracteres.',
            'direccion.required' => 'El campo direccion es obligatorio.',
            'direccion.string' => 'El valor de direccion debe ser una cadena de texto.',
            'direccion.min' => 'La longitud mínima para direccion es de 2 caracteres.',
            'direccion.max' => 'La longitud máxima para direccion es de 255 caracteres.',
            'telefono.required' => 'El campo telefono es obligatorio.',
            'telefono.string' => 'El valor de telefono debe ser una cadena de texto.',
            'telefono.min' => 'La longitud mínima para telefono es de 2 caracteres.',
            'telefono.max' => 'La longitud máxima para telefono es de 20 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'email.string' => 'El valor de email debe ser una cadena de texto.',
            'email.max' => 'La longitud máxima para email es de 255 caracteres.',
            'rubro.required' => 'El campo rubro es obligatorio.',
            'rubro.string' => 'El valor de rubro debe ser una cadena de texto.',
            'rubro.min' => 'La longitud mínima para rubro es de 2 caracteres.',
            'rubro.max' => 'La longitud máxima para rubro es de 255 caracteres.',
        ]);


        Proveedor::create([
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'rubro' => $request->rubro,
        ]);

        return redirect()->route('ListProveedor')->with('success', 'Proveedor creado exitosamente');
    }

    public function list(){
        $proveedor = Proveedor::all();
        return view('vistas.proveedor.list', ['mostrarproveedor' => $proveedor]);
    }
    public function Details($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return redirect()->route('ListProveedor')->with('error', 'Proveedor no encontrado');
        }

        return view('vistas.Proveedor.details', ['proveedor' => $proveedor]);
    }

    public function delete($id) {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return redirect()->route('ListProveedor')->with('error', 'La proveedor no existe.');
        }

        // Usar DB::transaction para asegurarse de que la operación sea exitosa
        DB::transaction(function () use ($proveedor) {
            // Eliminar la proveedor de forma suave
            $proveedor->delete();
        });

        return redirect()->route('ListProveedor')->with('success', 'El proveedor ha sido eliminada de forma suave.');
    }

    /////////////

    public function showUpdateProveedor($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return redirect()->route('ListProveedor')->with('error', 'Proveedor no encontrado');
        }

        return view('vistas.Proveedor.update', ['proveedor' => $proveedor]);
    }


    function Update(Request $request, $id){

        $request->validate([
            'nombre' => 'required:proveedor',
            'rut' => 'required:proveedor', // Cambiamos 'empleados' por 'proveedor'
            'pais' => 'required:proveedor',
            'region' => 'required:proveedor',
            'direccion' => 'required:proveedor',
            'telefono' => 'required:proveedor',
            'email' => 'required|email:proveedor', // Cambiamos 'empleados' por 'proveedor'
            'rubro' => 'required:proveedor',
        ]);

        // Obtener la Proveedor que se desea actualizar por su ID
        $proveedor = Proveedor::find($id);

        // Verificar si se encontró la Proveedor
        if (!$proveedor) {
            return redirect()->route('ListProveedor')->with('error', 'Proveedor no encontrada');
        }

        // Actualizar los atributos de la Proveedor con los valores del formulario
        $proveedor->update([
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'rubro' => $request->rubro,
        ]);

        return redirect()->route('ListProveedor')->with('success', 'Proveedor actualizada exitosamente');
    }
}
