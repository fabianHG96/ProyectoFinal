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
            'proveedor_id' => 'required|exists:proveedor,id', // Asumiendo que proveedor_id debe existir en la tabla 'proveedor'
            'nombre' => 'required|string|min:2|max:255', // Ajusta la longitud mínima y máxima según tus necesidades
            'apellido' => 'required|string|min:2|max:255', // Ajusta la longitud mínima y máxima según tus necesidades
            'rut' => 'required|unique:vendedor|string|min:2|max:20', // Ajusta la longitud mínima y máxima según tus necesidades
            'direccion' => 'required|string|min:2|max:255', // Ajusta la longitud mínima y máxima según tus necesidades
            'email' => 'required|email|unique:vendedor|string|max:255', // Ajusta la longitud máxima según tus necesidades
            'telefono' => 'required|string|min:2|max:20', // Ajusta la longitud mínima y máxima según tus necesidades
            'estado_laboral' => 'required|string|min:2|max:255', // Ajusta la longitud mínima y máxima según tus necesidades
        ], [
            'proveedor_id.required' => 'El campo proveedor_id es obligatorio.',
            'proveedor_id.exists' => 'El proveedor especificado no existe.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El valor de nombre debe ser una cadena de texto.',
            'nombre.min' => 'La longitud mínima para nombre es de 2 caracteres.',
            'nombre.max' => 'La longitud máxima para nombre es de 255 caracteres.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'apellido.string' => 'El valor de apellido debe ser una cadena de texto.',
            'apellido.min' => 'La longitud mínima para apellido es de 2 caracteres.',
            'apellido.max' => 'La longitud máxima para apellido es de 255 caracteres.',
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.unique' => 'El rut ya está registrado.',
            'rut.string' => 'El valor de rut debe ser una cadena de texto.',
            'rut.min' => 'La longitud mínima para rut es de 2 caracteres.',
            'rut.max' => 'La longitud máxima para rut es de 20 caracteres.',
            'direccion.required' => 'El campo direccion es obligatorio.',
            'direccion.string' => 'El valor de direccion debe ser una cadena de texto.',
            'direccion.min' => 'La longitud mínima para direccion es de 2 caracteres.',
            'direccion.max' => 'La longitud máxima para direccion es de 255 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'email.string' => 'El valor de email debe ser una cadena de texto.',
            'email.max' => 'La longitud máxima para email es de 255 caracteres.',
            'telefono.required' => 'El campo telefono es obligatorio.',
            'telefono.string' => 'El valor de telefono debe ser una cadena de texto.',
            'telefono.min' => 'La longitud mínima para telefono es de 2 caracteres.',
            'telefono.max' => 'La longitud máxima para telefono es de 20 caracteres.',
            'estado_laboral.required' => 'El campo estado_laboral es obligatorio.',
            'estado_laboral.string' => 'El valor de estado_laboral debe ser una cadena de texto.',
            'estado_laboral.min' => 'La longitud mínima para estado_laboral es de 2 caracteres.',
            'estado_laboral.max' => 'La longitud máxima para estado_laboral es de 255 caracteres.',
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


public function Details($id)
{
    $vendedor = Vendedor::find($id);

    if (!$vendedor) {
        return redirect()->route('ListVendedor')->with('error', 'Vendedor no encontrado');
    }

    return view('vistas.vendedor.details', ['vendedor' => $vendedor]);
}

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
