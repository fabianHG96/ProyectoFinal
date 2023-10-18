<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use App\Models\Vendedor;
use App\Models\OrdenDeCompra;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrdenDeCompraController extends Controller
{
    function ShowNewOrden(){
        $proveedores = Proveedor::all();
        $vendedores = Vendedor::all(); // Inicialmente, la lista de vendedores estará vacía
        return View('vistas.ordendecompra.create', compact('vendedores', 'proveedores'));

     }

     function createNewOrden(Request $request){
        $request->validate([
            'fsolicitud' => 'required|date',
            'ftermino' => 'required|date',
            'proveedor_id' => 'required|exists:proveedor,id',
            'vendedor_id' => 'required|exists:vendedor,id',
            'nitem' => 'required',
            'cantidad' => 'required',
            'monto' => 'required',
            'total' => 'required',
        ]);

        OrdenDeCompra::create([
            'fecha_solicitud' => $request->fsolicitud,
            'fecha_termino' => $request->ftermino,
            'proveedor_id' => $request->proveedor_id,
            'vendedor_id' => $request->vendedor_id,
            'nombre_producto' => $request->nitem,
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

     function Update(){
        return View('vistas.ordendecompra.update');
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
}
