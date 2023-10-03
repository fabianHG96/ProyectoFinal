<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ev1Controller;
use App\Http\Controllers\FlexController;
use App\Http\Controllers\HomeController;
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
