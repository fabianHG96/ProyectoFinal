<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use App\Models\Vendedor;
use App\Models\Empleado;
use App\Models\OrdenDeCompra;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class OrdenDeCompraController extends Controller
{
    function ShowNewOrden(){
        $proveedores = Proveedor::all();
        $vendedores = Vendedor::all(); // Inicialmente, la lista de vendedores estará vacía
        $empleados = Empleado::all();
        $productos = Producto::all();
        return View('vistas.ordendecompra.create', compact('vendedores', 'proveedores', 'empleados', 'productos'));

     }

     function createNewOrden(Request $request)
    {
        try {
            $request->validate([
                'fsolicitud' => 'required|date',
                'ftermino' => 'required|date|after_or_equal:fsolicitud', // Asegura que la fecha de término sea igual o posterior a la fecha de solicitud
                'proveedor_id' => 'required|exists:proveedor,id',
                'vendedor_id' => 'required|exists:vendedor,id',
                'empleado_id' => 'required|exists:empleados,id',
                'producto_id' => 'required|exists:productos,id',
                'nombre_producto' => 'required|exists:productos,nombre_producto',
                'estado' => 'required',
                'cantidad' => 'required|integer|min:1', // Asegura que la cantidad sea al menos 1
                'monto' => 'required|numeric|min:0', // Asegura que el monto no sea negativo
                'total' => 'required|numeric|min:0', // Asegura que el total no sea negativo // Añade la posibilidad de un comprobante de pago (ajusta según tus necesidades)
            ], [
                'fsolicitud.required' => 'El campo fsolicitud es obligatorio.',
                'fsolicitud.date' => 'El campo fsolicitud debe ser una fecha válida.',
                'ftermino.required' => 'El campo ftermino es obligatorio.',
                'ftermino.date' => 'El campo ftermino debe ser una fecha válida.',
                'ftermino.after_or_equal' => 'La fecha de término debe ser igual o posterior a la fecha de solicitud.',
                'proveedor_id.required' => 'El campo proveedor_id es obligatorio.',
                'proveedor_id.exists' => 'El proveedor especificado no existe.',
                'vendedor_id.required' => 'El campo vendedor_id es obligatorio.',
                'vendedor_id.exists' => 'El vendedor especificado no existe.',
                'empleado_id.required' => 'El campo empleado_id es obligatorio.',
                'empleado_id.exists' => 'El empleado especificado no existe.',
            ]);


            // Obtiene el nombre del proveedor
            $nombreProveedor = Proveedor::find($request->proveedor_id)->nombre;

            // Crea la orden de compra
            OrdenDeCompra::create([
                'fecha_solicitud' => $request->fsolicitud,
                'fecha_termino' => $request->ftermino,
                'proveedor_id' => $request->proveedor_id,
                'nombre_proveedor' => $nombreProveedor,
                'vendedor_id' => $request->vendedor_id,
                'empleado_id' => $request->empleado_id,
                'producto_id' => $request->producto_id,
                'nombre_producto' => $request->nombre_producto,
                'estado' => $request->estado,
                'cantidad' => $request->cantidad,
                'monto' => $request->monto,
                'total' => $request->total,
            ]);

            // Actualiza el stock del producto
            $producto = Producto::find($request->producto_id);
            $producto->cantidad_stock += $request->cantidad;
            $producto->save();

            return redirect()->route('ListOrdenDeCompra')->with('success', 'Orden De Compra creado exitosamente');
        } catch (ValidationException $e) {
            // Captura la excepción de validación y redirige de nuevo al formulario con los errores
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            // Captura excepciones de la base de datos y maneja según sea necesario
            return redirect()->back()->with('error', 'Error al guardar la orden: ' . $e->getMessage())->withInput();
        } catch (\Exception $e) {
            // Captura otras excepciones no manejadas y maneja según sea necesario
            return redirect()->back()->with('error', 'Error inesperado: ' . $e->getMessage())->withInput();
        }
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
     public function Details($id)
     {
         $ordendecompra = OrdenDeCompra::find($id);

         if (!$ordendecompra) {
             return redirect()->route('ListOrdenDeCompra')->with('error', 'Orden de Compra no encontrada');
         }

         // Asegúrate de tener los datos necesarios en las variables $empleados, $proveedores, $vendedores y $productos antes de pasarlos a la vista.
         $proveedores = Proveedor::all();
         $vendedores = Vendedor::all(); // Inicialmente, la lista de vendedores estará vacía
         $empleados = Empleado::all();
         $productos = Producto::all();

         return view('vistas.ordendecompra.details', [
             'ordendecompra' => $ordendecompra,

             'proveedores' => $proveedores,
             'vendedores' => $vendedores,
             'empleados' => $empleados,
             'productos' => $productos,
         ]);
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
    ////////////////////

    public function showUpdateOrdenDeCompra($id)
    {
        $ordendecompra = OrdenDeCompra::find($id);

        if (!$ordendecompra) {
            return redirect()->route('ListOrdenDeCompra')->with('error', 'OrdenDeCompra no encontrado');
        }

        $proveedores = Proveedor::all();
        $vendedores = Vendedor::all(); // Inicialmente, la lista de vendedores estará vacía
        $empleados = Empleado::all();
        $productos = Producto::all();


        return view('vistas.ordendecompra.update', [
            'ordendecompra' => $ordendecompra,
            'proveedores' => $proveedores,
            'vendedores' => $vendedores,
            'empleados' => $empleados,
            'productos' => $productos,
        ]);
    }

    function Update(Request $request, $id){

        $request->validate([

            'fsolicitud' => 'required|date',
            'ftermino' => 'required|date',
            'proveedor_id' => 'required:proveedor,id',
            'vendedor_id' => 'required:vendedor,id',
            'empleado_id' => 'required:empleados,id',
            'producto_id' => 'required:productos,id',
            'nombre_producto' => 'required:productos,nombre_producto',
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
            'prodcucto_id' => $request->producto,
            'estado' => $request->estado,
            'cantidad' => $request->cantidad,
            'monto' => $request->monto,
            'total' => $request->total,
        ]);

        return redirect()->route('ListOrdenDeCompra')->with('success', 'Empresa actualizada exitosamente');
    }
}
