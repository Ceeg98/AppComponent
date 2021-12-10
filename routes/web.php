<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

// Componentes GET

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/listar', [App\Http\Controllers\ComponentesController::class, 'listar'])->name('listarComponentes');
Route::get('/editarComponente/{id}', [App\Http\Controllers\ComponentesController::class, 'index'])->name('editarComponente');
Route::get('/agregar', [App\Http\Controllers\ComponentesController::class, 'agregar'])->name('agregarComponentes');
Route::get('/miniatura/{filename}', [App\Http\Controllers\ComponentesController::class, 'getImagen'])->name('miniatura');
Route::get('/eliminarComponente/{id}', [App\Http\Controllers\ComponentesController::class, 'deleteComponente'])->name('eliminarComponente');
Route::get('/buscarComponente/{search?}', [App\Http\Controllers\ComponentesController::class, 'searchProduct'])->name('buscarComponente');

// Componentes POST
Route::post('/guardarComponente', [App\Http\Controllers\ComponentesController::class, 'guardar']);
Route::post('/actualizarComponente', [App\Http\Controllers\ComponentesController::class, 'editComponente'])->name('actualizarComponente');;

//Sucursal GET

Route::get('/listarSucursales', [App\Http\Controllers\SucursalesController::class, 'listar'])->name('listarSucursales');
Route::get('/agregarSucursales', [App\Http\Controllers\SucursalesController::class, 'agregar'])->name('agregarSucursales');
Route::get('/eliminarSucursal/{id}', [App\Http\Controllers\SucursalesController::class, 'deleteSucursal'])->name('eliminarSucursal');
Route::get('/editarSucursal/{id}', [App\Http\Controllers\SucursalesController::class, 'editSucursal'])->name('editarSucursal');
//Sucursal POST

Route::post('/guardarSucursal', [App\Http\Controllers\SucursalesController::class, 'guardar']);
Route::post('/actualizarSucursal', [App\Http\Controllers\SucursalesController::class, 'actualizar']);

// ComponentesSucursal GET

Route::get('/listarComponenteSucursal/{id}', [App\Http\Controllers\ComponenteSucursalController::class, 'listar'])->name('listarComponenteSucursal');
Route::get('/editarComponenteSucursal/{id}', [App\Http\Controllers\ComponenteSucursalController::class, 'editar'])->name('editarComponenteSucursal');
Route::get('/eliminarComponenteSucursal/{id}', [App\Http\Controllers\ComponenteSucursalController::class, 'eliminar'])->name('eliminarComponenteSucursal');

// ComponentesSucursal POST

Route::post('/actualizarComponenteSucursal', [App\Http\Controllers\ComponenteSucursalController::class, 'actualizar']);





