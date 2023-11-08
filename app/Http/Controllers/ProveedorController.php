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
            'nombre' => 'required:proveedor',
            'rut' => 'required|unique:proveedor', // Cambiamos 'empleados' por 'proveedor'
            'pais' => 'required:proveedor',
            'region' => 'required:proveedor',
            'direccion' => 'required:proveedor',
            'telefono' => 'required:proveedor',
            'email' => 'required|email|unique:proveedor', // Cambiamos 'empleados' por 'proveedor'
            'rubro' => 'required:proveedor',
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
