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
use App\Notifications\StockNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductoController extends Controller
{
    use SoftDeletes;


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
            'cantidad_stock.*' => 'required|integer|min:0', // Asegura que la cantidad de stock no sea negativa
            'precio_unitario.*' => 'required|numeric|min:0', // Asegura que el precio unitario no sea negativo
            'nombre_producto.*' => 'required|string|max:255', // Ajusta la longitud máxima según tus necesidades
        ], [
            'bodega_id.*.required' => 'El campo bodega_id es obligatorio.',
            'bodega_id.*.exists' => 'La bodega especificada no existe.',
            'categoria_id.*.required' => 'El campo categoria_id es obligatorio.',
            'categoria_id.*.exists' => 'La categoría especificada no existe.',
            'cantidad_stock.*.required' => 'El campo cantidad_stock es obligatorio.',
            'cantidad_stock.*.integer' => 'La cantidad de stock debe ser un número entero.',
            'cantidad_stock.*.min' => 'La cantidad de stock no puede ser negativa.',
            'precio_unitario.*.required' => 'El campo precio_unitario es obligatorio.',
            'precio_unitario.*.numeric' => 'El precio unitario debe ser un valor numérico.',
            'precio_unitario.*.min' => 'El precio unitario no puede ser negativo.',
            'nombre_producto.*.required' => 'El campo nombre_producto es obligatorio.',
            'nombre_producto.*.string' => 'El valor de nombre_producto debe ser una cadena de texto.',
            'nombre_producto.*.max' => 'La longitud máxima para nombre_producto es de 255 caracteres.',
        ]);


    $bodegaIds = $request->bodega_id;
    $categoriaIds = $request->categoria_id;
    $cantidades = $request->cantidad_stock;
    $precios = $request->precio_unitario;
    $nombres = $request->nombre_producto;
    $totals =  $request->total;

    // Iterar sobre los campos de matriz y crear productos
    foreach ($bodegaIds as $key => $bodegaId) {
        $producto = Producto::create([
            'bodega_id' => $bodegaId,
            'categoria_id' => $categoriaIds[$key],
            'cantidad_stock' => $cantidades[$key],
            'precio_unitario' => $precios[$key],
            'nombre_producto' => $nombres[$key],
            'total' => $totals[$key],
        ]);

        // Verificar si la cantidad de stock es inferior a 10 y enviar notificación
        if ($producto->cantidad_stock < 10) {
            $user = auth()->user();
            Notification::send($user, new StockNotification());
            dd('Notificación enviada con éxito.'); // Agrega esto para depuración
        }
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

    if ($request->input('Cantidad_Stock') < 0) {
        return view('vistas.producto.update', ['producto' => $producto])->with('error', 'La cantidad no puede ser menor que cero');
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


public function List()
{
    $productos = Producto::all();

    return view('vistas.producto.list', ['mostrarproducto' => $productos]);
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
    $producto = Producto::find($id); // Obtener el producto desde la base de datos

    // Renderizar la vista 'detalles_producto' con la información del producto
    $pdf = FacadePdf::loadView('vistas.producto.detalles_producto', compact('producto'));

    // Descargar el PDF
    return $pdf->download('detalles_producto.pdf');
}

public function delete($id)
{
    $producto = Producto::find($id);

    if (!$producto) {
        return redirect()->route('ListProductos')->with('error', 'El producto no existe.');
    }

    // Usar DB::transaction para asegurarse de que la operación sea exitosa
    DB::transaction(function () use ($producto) {
        // "Soft delete" del producto
        $producto->delete();
    });

    return redirect()->route('ListProductos')->with('success', 'El producto ha sido eliminado de forma suave.');
}

}
