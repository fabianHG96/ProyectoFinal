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
    function Update(){return View('vistas.proveedor.update');}
    public function list(){
        $proveedor = Proveedor::all();
        return view('vistas.proveedor.list', ['mostrarproveedor' => $proveedor]);
    }
    function Details(){return View('vistas.proveedor.details');}

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

        return redirect()->route('ListProveedor')->with('success', 'La proveedor ha sido eliminada de forma suave.');
    }
}
