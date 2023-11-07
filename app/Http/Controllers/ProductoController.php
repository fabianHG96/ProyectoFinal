<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ProductoController extends Controller
{
    public function ShowNewProducto()
{
    $bodegas = Bodega::all();
    $categorias = Categoria::all();


    return view('vistas.producto.create', compact( 'bodegas', 'categorias'));
}

public function CreateNewProducto(Request $request)
{
    $request->validate([
        'bodega_id.*' => 'required|exists:bodegas,id',
        'categoria_id.*' => 'required|exists:categorias,id',
        'cantidad_stock.*' => 'required',
        'precio_unitario.*' => 'required',
        'nombre_producto.*' => 'required',

    ]);

    $bodegaIds = $request->bodega_id;
    $categoriaIds = $request->categoria_id;
    $cantidades = $request->cantidad_stock;
    $precios = $request->precio_unitario;
    $nombres = $request->nombre_producto;
    $totals =  $request -> total;

    // Iterar sobre los campos de matriz y crear productos
    foreach ($bodegaIds as $key => $bodegaId) {
        Producto::create([
            'bodega_id' => $bodegaId,
            'categoria_id' => $categoriaIds[$key],
            'cantidad_stock' => $cantidades[$key],
            'precio_unitario' => $precios[$key],
            'nombre_producto' => $nombres[$key],
            'total' => $totals[$key],
        ]);
    }
    return redirect()->route('ListProductos')->with('success', 'Producto creado exitosamente');
}


public function showUpdateProducto($id)
{
// Obtener la bodega que se desea actualizar por su ID
$producto = Producto::find($id);

// Verificar si se encontró la producto
     if (!$producto)  {
    return redirect()->route('ListProducto')->with('error', 'producto no encontrada');
    }

// Pasar la bodega a la vista de actualización
return view('vistas.producto.update', ['producto' => $producto]);
}

function Update(Request $request, $id){

    $request->validate([
        'Nombre_Producto' => 'required',
        'Cantidad_Stock' => 'required',
        'Precio_Unitario' => 'required',
    ]);

    // Obtener el producto que se desea actualizar por su ID
    $producto = Producto::find($id);

    // Verificar si se encontró el producto
    if (!$producto) {
        return redirect()->route('ListProductos')->with('error', 'Producto no encontrado');
    }

    // Actualizar los atributos del producto con los valores del formulario
    $producto->update([
        'nombre_producto' => $request->input('Nombre_Producto'),
        'cantidad_stock' => $request->input('Cantidad_Stock'),
        'precio_unitario' => $request->input('Precio_Unitario'),
        'total' => $request->input('Total'),
    ]);

    return redirect()->route('ListProductos')->with('success', 'Producto actualizado exitosamente');
}


 function List(){
    $producto = Producto::all();
    return view('vistas.producto.list', ['mostrarproducto' => $producto]);
 }
 public function Details($id) {
    // Obtener el producto por su ID
    $producto = Producto::find($id);

    // Verificar si se encontró el producto
    if (!$producto) {
        return redirect()->route('ListProductos')->with('error', 'Producto no encontrado');
    }

    return view('vistas.producto.details', ['producto' => $producto]);
}


public function descargarDetalles($id)
{
    $producto = Producto::find($id);

    if (!$producto) {
        return redirect()->route('ListProductos')->with('error', 'Producto no encontrado');
    }

    $pdf = FacadePdf::loadView('vistas.producto.details', compact('producto'));

    return $pdf->download('detalle_producto.pdf');
}

 public function delete($id) {
    $producto = Producto::find($id);

    if (!$producto) {
        return redirect()->route('ListProductos')->with('error', 'El producto no existe.');
    }

    // Usar DB::transaction para asegurarse de que la operación sea exitosa
    DB::transaction(function () use ($producto) {
        // Eliminar la empresa de forma suave
        $producto->delete();
    });

    return redirect()->route('ListProductos')->with('success', 'El producto ha sido eliminado de forma suave.');
}

}
