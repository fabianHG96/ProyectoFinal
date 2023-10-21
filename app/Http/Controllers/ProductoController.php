<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

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
        'bodega_id' => 'required|exists:bodega,id',
        'categoria_id' => 'required',
        'cantidad_stock' => 'required',
        'precio_unitario' => 'required',
        'nombre_producto' => 'required',
    ]);

    Producto::create([
        'bodega_id' => $request->bodega_id,
        'categoria_id' => $request->categoria_id,
        'cantidad_stock' => $request->cantidad_stock,
        'precio_unitario' => $request->precio_unitario,
        'nombre_producto' => $request->nombre_producto,
    ]);

    return redirect()->route('ListProductos')->with('success', 'Producto creado exitosamente');
}

function Update(){
    return View('vistas.producto.update');
 }
 function List(){
    return View('vistas.producto.list');
 }
 function Details(){
    return View('vistas.producto.details');
 }

 public function delete($id) {

    return View('vistas.producto.list');
}

}
