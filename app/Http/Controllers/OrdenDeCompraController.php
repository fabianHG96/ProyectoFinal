<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use App\Models\Vendedor;
use App\Models\Empleado;
use App\Models\OrdenDeCompra;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrdenDeCompraController extends Controller
{
    function ShowNewOrden(){
        $proveedores = Proveedor::all();
        $vendedores = Vendedor::all(); // Inicialmente, la lista de vendedores estará vacía
        $proveedores = Empleado::all();
        return View('vistas.ordendecompra.create', compact('vendedores', 'proveedores'));

     }

     function createNewOrden(Request $request){
        $request->validate([
            'fsolicitud' => 'required|date',
            'ftermino' => 'required|date',
            'proveedor_id' => 'required|exists:proveedor,id',
            'vendedor_id' => 'required|exists:vendedor,id',
            'empleado_id' => 'required|exists:empleado,id',
            'nitem' => 'required',
            'estado' => 'required',
            'cantidad' => 'required',
            'monto' => 'required',
            'total' => 'required',
        ]);

        OrdenDeCompra::create([
            'fecha_solicitud' => $request->fsolicitud,
            'fecha_termino' => $request->ftermino,
            'proveedor_id' => $request->proveedor_id,
            'vendedor_id' => $request->vendedor_id,
            'empleado_id' => $request->empleado_id,
            'nombre_producto' => $request->nitem,
            'estado' => $request->estado,
            'cantidad' => $request->cantidad,
            'monto' => $request->monto,
            'total' => $request->total,
        ]);

        return redirect()->route('ListOrdenDeCompra')->with('success', 'Orden De Compra creado exitosamente');
    }
    public function getVendedores($proveedorId)
    {
        $vendedores = Vendedor::where('proveedor_id', $proveedorId)->get();
        return response()->json($vendedores);
    }
     function List(){
        $ordendecompra = OrdenDeCompra::all();
        return View('vistas.ordendecompra.list', ['mostrarordenes' => $ordendecompra]);
     }
     function Details(){
        return View('vistas.ordendecompra.details');
     }

     public function delete($id) {
        $ordendecompra = OrdenDeCompra::find($id);

        if (!$ordendecompra) {
            return redirect()->route('ListOrdenDeCompra')->with('error', 'La Orden De Compra no existe.');
        }

        // Usar DB::transaction para asegurarse de que la operación sea exitosa
        DB::transaction(function () use ($ordendecompra) {
            // Eliminar la empresa de forma suave
            $ordendecompra->delete();
        });

        return redirect()->route('ListOrdenDeCompra')->with('success', 'Orden De Compra ha sido eliminada de forma suave.');
    }

    function Update(Request $request, $id){

        $request->validate([

            'fsolicitud' => 'required|date',
            'ftermino' => 'required|date',
            'proveedor_id' => 'required|exists:proveedor,id',
            'vendedor_id' => 'required|exists:vendedor,id',
            'empleado_id' => 'required|exists:empleado,id',
            'nitem' => 'required',
            'estado' => 'required',
            'cantidad' => 'required',
            'monto' => 'required',
            'total' => 'required',
        ]);

        // Obtener la Empresa que se desea actualizar por su ID
        $ordendecompra = OrdenDeCompra::find($id);

        // Verificar si se encontró la Empresa
        if (!$ordendecompra) {
            return redirect()->route('ListOrdendecompra')->with('error', 'Empresa no encontrada');
        }

        // Actualizar los atributos de la Empresa con los valores del formulario
        $ordendecompra->update([
            'fecha_solicitud' => $request->fsolicitud,
            'fecha_termino' => $request->ftermino,
            'proveedor_id' => $request->proveedor_id,
            'vendedor_id' => $request->vendedor_id,
            'empleado_id' => $request->empleado_id,
            'nombre_producto' => $request->nitem,
            'estado' => $request->estado,
            'cantidad' => $request->cantidad,
            'monto' => $request->monto,
            'total' => $request->total,
        ]);

        return redirect()->route('ListEmpresa')->with('success', 'Empresa actualizada exitosamente');
    }
}
