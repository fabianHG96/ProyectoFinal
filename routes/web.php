<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BodegaController;
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



Route::group(['prefix' => '/login'], function(){
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/', [AuthController::class, 'attemptLogin'])->name('login.attempt');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/register'], function(){
    Route::get('/', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/', [AuthController::class, 'storeAccount'])->name('register.store');
});

Route::get('/home',[FlexController::class,'index'])->name('home');
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
Route::group(['prefix'=> 'persona'],function(){
Route::get('/create',[PersonaController::class,'Create'])->name('CreatePersona');
Route::get('/update',[PersonaController::class,'Update'])->name('UpdatePersona');
Route::get('/list',[PersonaController::class,'list'])->name('ListPersona');
Route::get('/details',[PersonaController::class,'details'])->name('DetailsPersona');
});

//proveedor
Route::group(['prefix'=> 'proveedor'],function(){
Route::get('/create',[ProveedorController::class,'Create'])->name('CreateProveedor');
Route::get('/update',[ProveedorController::class,'Update'])->name('UpdateProveedor');
Route::get('/list',[ProveedorController::class,'list'])->name('ListProveedor');
Route::get('/details',[ProveedorController::class,'details'])->name('DetailsProveedor');
});

//bodega
Route::group(['prefix'=> 'bodega'],function(){
    Route::get('/create',[BodegaController::class,'Create'])->name('CreateBodega');
    Route::get('/update',[BodegaController::class,'Update'])->name('UpdateBodega');
    Route::get('/list',[BodegaController::class,'list'])->name('ListBodega');
    Route::get('/details',[BodegaController::class,'details'])->name('DetailsBodega');
});
