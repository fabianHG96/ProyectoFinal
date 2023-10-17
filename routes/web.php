<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteEmpresaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ev1Controller;
use App\Http\Controllers\FlexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenDeCompraController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VendedorController;
use App\Models\Categoria;
use App\Models\ClienteEmpresa;
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

//Respaldo facturas
Route::get('/respaldo/facturas',[FlexController::class,'RespaldoFacturas'])->name('RespaldoFacturas');

//Seguimiento financiero clientes
Route::get('/seguimiento/clientes',[FlexController::class,'SeguimientoClientes'])->name('SeguimientoClientes');

//Seguimiento financiero productos
Route::get('/seguimiento/productos',[FlexController::class,'SeguimientoProductos'])->name('SeguimientoProductos');

//Seguimiento financiero proveedores
Route::get('/seguimiento/proveedores',[FlexController::class,'SeguimientoProveedores'])->name('SeguimientoProveedores');

//Persona
Route::group(['prefix'=> 'empleado'],function(){
Route::get('/create',[EmpleadoController::class,'ShowNewEmpleado'])->name('CreateEmpleado');
Route::post('/create', [EmpleadoController::class, 'CreateNewEmpleado'])->name('register.empleado')->middleware('auth');
Route::get('/update',[EmpleadoController::class,'Update'])->name('UpdateEmpleado');
Route::get('/list',[EmpleadoController::class,'list'])->name('ListEmpleado');
Route::get('/details',[EmpleadoController::class,'details'])->name('DetailsEmpleado');
});

//Vendedor
Route::group(['prefix'=> 'vendedor'],function(){
    Route::get('/create',[VendedorController::class,'ShowNewVendedor'])->name('CreateVendedor');
    Route::post('/create', [VendedorController::class, 'CreateNewVendedor'])->name('register.Vendedor')->middleware('auth');
    Route::get('/update',[VendedorController::class,'Update'])->name('UpdateVendedor');
    Route::get('/list',[VendedorController::class,'list'])->name('ListVendedor');
    Route::get('/details',[VendedorController::class,'details'])->name('DetailsVendedor');
    });

//Empresa
Route::group(['prefix'=> 'empresa'],function(){
    Route::get('/create',[EmpresaController::class,'ShowNewEmpresa'])->name('CreateEmpresa');
    Route::post('/create', [EmpresaController::class, 'CreateNewEmpresa'])->name('register.Empresa')->middleware('auth');
    Route::get('/update',[EmpresaController::class,'Update'])->name('UpdateEmpresa');
    Route::get('/list',[EmpresaController::class,'list'])->name('ListEmpresa');
    Route::get('/details',[EmpresaController::class,'details'])->name('DetailsEmpresa');
    });

//ClienteEmpresa
Route::group(['prefix'=> 'clienteEmpresa'],function(){
    Route::get('/create',[ClienteEmpresaController::class,'ShowNewClienteEmpresa'])->name('CreateClienteEmpresa');
    Route::post('/create', [ClienteEmpresaController::class, 'CreateNewClienteEmpresa'])->name('register.ClienteEmpresa')->middleware('auth');
    Route::get('/update',[ClienteEmpresaController::class,'Update'])->name('UpdateClienteEmpresa');
    Route::get('/list',[ClienteEmpresaController::class,'list'])->name('ListClienteEmpresa');
    Route::get('/details',[ClienteEmpresaController::class,'details'])->name('DetailsClienteEmpresa');
    });

//proveedor
Route::group(['prefix'=> 'proveedor'],function(){
Route::get('/create',[ProveedorController::class,'ShowNewProveedor'])->name('CreateProveedor');
Route::post('/create', [ProveedorController::class, 'createNewProveedor'])->name('register.proveedor')->middleware('auth');
Route::get('/update',[ProveedorController::class,'Update'])->name('UpdateProveedor');
Route::get('/list',[ProveedorController::class,'list'])->name('ListProveedor');
Route::get('/details',[ProveedorController::class,'details'])->name('DetailsProveedor');
});

//bodega
Route::group(['prefix'=> 'bodega'],function(){
    Route::get('/create',[BodegaController::class,'ShowNewBodega'])->name('CreateBodega');
    Route::post('/create', [BodegaController::class, 'CreateNewBodega'])->name('register.Bodega')->middleware('auth');
    Route::get('/update',[BodegaController::class,'Update'])->name('UpdateBodega');
    Route::get('/list',[BodegaController::class,'list'])->name('ListBodega');
    Route::get('/details',[BodegaController::class,'details'])->name('DetailsBodega');
});

Route::group(['prefix'=> 'categoria'],function(){
    Route::get('/create',[CategoriaController::class,'ShowNewCategoria'])->name('CreateCategoria');
    Route::post('/create', [CategoriaController::class, 'CreateNewCategoria'])->name('register.Categoria')->middleware('auth');
    Route::get('/update',[CategoriaController::class,'Update'])->name('UpdateCategoria');
    Route::get('/list',[CategoriaController::class,'list'])->name('ListCategoria');
    Route::get('/details',[CategoriaController::class,'details'])->name('DetailsCategoria');
});
