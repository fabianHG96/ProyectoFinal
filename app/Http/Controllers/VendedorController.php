<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

use App\Models\Proveedor;

use Illuminate\Support\Facades\DB;



class VendedorController extends Controller
{
    public function showNewVendedor()
    {
        $proveedores = Proveedor::all();
        return view('vistas.vendedor.create',['proveedores' => $proveedores]);
    }

    public function createNewVendedor(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'rut' => 'required|unique:vendedor',
            'direccion' => 'required',
            'email' => 'required|email|unique:vendedor',
            'telefono' => 'required',
            'estado_laboral' => 'required',
        ]);


        // Verificar si se seleccionó un proveedor en el formulario
        if ($request->has('proveedor_id')) {
            $data['proveedor_id'] = $request->proveedor_id;
        }

        Vendedor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'rut' => $request->rut,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'estado_laboral' => $request->estado_laboral,
            'proveedor_id' => $data['proveedor_id'],

        ]);

        return redirect()->route('ListVendedor')->with('success', 'Vendedor creado exitosamente');
    }

    public function showUpdateVendedor($id)
{
    $vendedor = Vendedor::find($id);

    if (!$vendedor) {
        return redirect()->route('ListVendedor')->with('error', 'Vendedor no encontrado');
    }

    return view('vistas.vendedor.update', ['vendedor' => $vendedor]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'rut' => 'required|unique:vendedor,rut,' . $id,
        'direccion' => 'required',
        'email' => 'required|email|unique:vendedor,email,' . $id,
        'telefono' => 'required',
        'estado_laboral' => 'required',
    ]);

    // Obtener el vendedor que se desea actualizar por su ID
    $vendedor = Vendedor::find($id);

    if (!$vendedor) {
        return redirect()->route('ListVendedor')->with('error', 'Vendedor no encontrado');
    }

    $vendedor->update([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'rut' => $request->rut,
        'direccion' => $request->direccion,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'estado_laboral' => $request->estado_laboral,
    ]);

    return redirect()->route('ListVendedor')->with('success', 'Vendedor actualizado exitosamente');
}


    function Details(){return View('vistas.vendedor.details');}

    public function delete($id) {
        $vendedor = Vendedor::find($id);

        if (!$vendedor) {
            return redirect()->route('ListVendedor')->with('error', 'El vendedor no existe.');
        }

        // Usar DB::transaction para asegurarse de que El operación sea exitosa
        DB::transaction(function () use ($vendedor) {
            // Eliminar El vendedor de forma suave
            $vendedor->delete();
        });

        return redirect()->route('ListVendedor')->with('success', 'El vendedor ha sido eliminada de forma suave.');
    }

    public function list()
{
    $vendedor = Vendedor::all();
    return view('vistas.vendedor.list', ['mostrarvendedor' => $vendedor]);
}
}
