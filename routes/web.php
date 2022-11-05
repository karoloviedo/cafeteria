<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('productos', ProductoController::class)->names('pro');
Route::resource('ventas', VentaController::class)->names('venta');
Route::get('/buscarCliente', [ClienteController::class, 'buscarCliente'])->name('api.cliente');
Route::get('/storeClient', [ClienteController::class, 'storeClient'])->name('store.cliente');
Route::resource('clientes', ClienteController::class)->names('cli');
Route::get('/buscarProductos', [VentaController::class, 'searchProduct'])->name('api.productos');
Route::resource('usuarios', UsuarioController::class)->names('u');