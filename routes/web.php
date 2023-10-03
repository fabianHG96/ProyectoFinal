<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ev1Controller;
use App\Http\Controllers\FlexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenDeCompraController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProveedorController;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home',[FlexController::class,'index'])->name('home');

Route::get('/menu',[FlexController::class,'list'])->name('menu');
Route::get('/menu2',[FlexController::class,'list2'])->name('menu2');
Route::get('/logout',[FlexController::class,'logout'])->name('logout');

Route::group(['prefix'=> 'login'],function(){
Route::get('/',[FlexController::class,'login'])->name('login');
Route::post('/',[FlexController::class,'attemptlogin'])->name('login.attempt');

});

Route::group(['prefix'=> 'register'],function(){
    Route::get('/',[FlexController::class,'register'])->name('register');
    Route::post('/',[FlexController::class,'storageAccount'])->name('register.attempt');

});
Route::get('/home2', [FlexController::class, 'index2'])->name('home2')->middleware('auth');
Route::get('/', function () {

    return view('welcome');
});


//productos
Route::group(['prefix'=> 'producto'],function(){
Route::get('/create',[ProductosController::class,'Create'])->name('CreateProductos');
Route::get('/update',[ProductosController::class,'Update'])->name('UpdateProductos');
Route::get('/list',[ProductosController::class,'List'])->name('ListProductos');
Route::get('/details',[ProductosController::class,'Details'])->name('DetailsProductos');
});
//orden de compra
Route::group(['prefix'=> 'ordendecompra'],function(){
    Route::get('/create',[OrdenDeCompraController::class,'Create'])->name('CreateOrdenDeCompra');
    Route::get('/update',[OrdenDeCompraController::class,'Update'])->name('UpdateOrdenDeCompra');
    Route::get('/list',[OrdenDeCompraController::class,'List'])->name('ListOrdenDeCompra');
    Route::get('/details',[OrdenDeCompraController::class,'Details'])->name('DetailsOrdenDeCompra');
});


//Gestor de usuarios
Route::get('/manager/usuarios',[FlexController::class,'Manager'])->name('Usuarios');


//Persona
Route::get('/persona/create',[PersonaController::class,'Create'])->name('CreatePersona');
Route::get('/persona/update',[PersonaController::class,'Update'])->name('UpdatePersona');
Route::get('/persona/list',[PersonaController::class,'list'])->name('ListPersona');
Route::get('/persona/details',[PersonaController::class,'details'])->name('DetailsPersona');

//proveedor
Route::get('/proveedor/create',[ProveedorController::class,'Create'])->name('CreateProveedor');
Route::get('/proveedor/update',[ProveedorController::class,'Update'])->name('UpdateProveedor');
Route::get('/proveedor/list',[ProveedorController::class,'list'])->name('ListProveedor');
Route::get('/proveedor/details',[ProveedorController::class,'details'])->name('DetailsProveedor');
