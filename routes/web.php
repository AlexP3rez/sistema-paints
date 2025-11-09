<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\UsuarioController;

// Ruta principal
Route::get('/', function () {
    return redirect()->route('clientes.index');
});

// Rutas de recursos CRUD
Route::resource('clientes', ClienteController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('sucursales', SucursalController::class);
Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('tipos-pago', TipoPagoController::class);
Route::resource('usuarios', UsuarioController::class);