<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteEmpresa;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;

class ClienteEmpresaController extends Controller
{
    public function showNewClienteEmpresa()
    {
        $empresas = Empresa::all();
        return view('vistas.clienteempresa.create');
    }

    public function createNewClienteEmpresa(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'nombre' => 'required|min:2|max:255', // Agregado: Longitud mínima y máxima para el nombre
            'rut' => 'required|unique:cliente_empresas|min:7|max:12', // Agregado: Longitud y unicidad para el RUT
            'pais' => 'required|string|min:2', // Agregado: Longitud mínima para el país
            'region' => 'required|string|min:2', // Agregado: Longitud mínima para la región
            'direccion' => 'required|string|min:5', // Agregado: Longitud mínima para la dirección
            'email' => 'required|email|unique:cliente_empresas', // Agregado: Validación de correo electrónico y unicidad
            'telefono' => 'required|numeric|min:100000000|max:999999999', // Agregado: Número de teléfono con longitud específica
        ], [
            'empresa_id.required' => 'El campo empresa_id es obligatorio.',
            'empresa_id.exists' => 'La empresa especificada no existe.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 2 caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'rut.required' => 'El campo RUT es obligatorio.',
            'rut.unique' => 'El RUT ya está registrado.',
            'rut.min' => 'El RUT debe tener al menos 7 caracteres.',
            'rut.max' => 'El RUT no puede tener más de 12 caracteres.',
            'pais.required' => 'El campo país es obligatorio.',
            'pais.string' => 'El valor del país debe ser una cadena de texto.',
            'pais.min' => 'La longitud mínima para el país es de 2 caracteres.',
            'region.required' => 'El campo región es obligatorio.',
            'region.string' => 'El valor de la región debe ser una cadena de texto.',
            'region.min' => 'La longitud mínima para la región es de 2 caracteres.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El valor de la dirección debe ser una cadena de texto.',
            'direccion.min' => 'La longitud mínima para la dirección es de 5 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.numeric' => 'El teléfono debe ser un número.',
            'telefono.min' => 'El teléfono debe tener al menos 9 dígitos.',
            'telefono.max' => 'El teléfono no puede tener más de 9 dígitos.',
        ]);


        ClienteEmpresa::create([
            'empresa_id' => $request->empresa_id,
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('ListClienteEmpresa')->with('success', 'Cliente Empresa creado exitosamente');
    }

    public function showUpdateClienteEmpresa($id)
    {
        $clienteEmpresa = ClienteEmpresa::find($id);

        if (!$clienteEmpresa) {
            return redirect()->route('ListClienteEmpresa')->with('error', 'Cliente de la empresa no encontrado');
        }

        return view('vistas.clienteempresa.update', ['clienteEmpresa' => $clienteEmpresa]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'rut' => 'required|unique:cliente_empresas,rut,' . $id,
            'pais' => 'required',
            'region' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        // Obtener el cliente de la empresa que se desea actualizar por su ID
        $clienteEmpresa = ClienteEmpresa::find($id);

        if (!$clienteEmpresa) {
            return redirect()->route('ListClienteEmpresa')->with('error', 'Cliente de la empresa no encontrado');
        }

        $clienteEmpresa->update([
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            'pais' => $request->pais,
            'region' => $request->region,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('ListClienteEmpresa')->with('success', 'Cliente de la empresa actualizado exitosamente');
    }

    public function list(){
        $clienteempresa = ClienteEmpresa::all();
        return view('vistas.clienteempresa.list', ['mostrarcliente_empresas' => $clienteempresa]);
    }

    public function Details($id)
    {
        $clienteEmpresa = ClienteEmpresa::find($id);

        if (!$clienteEmpresa) {
            return redirect()->route('ListClienteEmpresa')->with('error', 'Cliente de la empresa no encontrado');
        }

        return view('vistas.clienteempresa.details', ['clienteEmpresa' => $clienteEmpresa]);
    }

    public function delete($id) {
        $clienteempresa = ClienteEmpresa::find($id);

        if (!$clienteempresa) {
            return redirect()->route('ListClienteEmpresa')->with('error', 'El cliente de la empresa no existe.');
        }

        // Usar DB::transaction para asegurarse de que El operación sea exitosa
        DB::transaction(function () use ($clienteempresa) {
            // Eliminar El clienteempresa de forma suave
            $clienteempresa->delete();
        });

        return redirect()->route('ListClienteEmpresa')->with('success', 'El cliente de la empresa ha sido eliminada de forma suave.');
    }
}
