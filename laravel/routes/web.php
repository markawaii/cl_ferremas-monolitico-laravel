<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuhtController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MarcasController;
use App\Http\Controllers\Web\ProductosController;
use App\Http\Controllers\Web\CategoriasController;


Route::get('/', [AuthController::class, 'signIn'])->name('sign-in');
Route::post('auth', [AuthController::class, 'auth'])->name('auth');
Route::get('sign-up', [AuthController::class, 'signUp'])->name('sign-up');
Route::post('create-account', [AuthController::class, 'createAccount'])->name('create-account');
Route::get('logout', [AuthController::class, 'logout'])->name('logout'); // Ruta de cierre de sesión con GET

Route::get('/inicio', [HomeController::class, 'index'])->name('inicio');

Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}', [ProductosController::class, 'show'])->name('productos.show');
Route::get('/productos/{id}/edit', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');

Route::get('/marcas', [MarcasController::class, 'index'])->name('marcas.index');
Route::post('/marcas/store', [MarcasController::class, 'store'])->name('marcas.store');
Route::get('/marcas/{id}', [MarcasController::class, 'show'])->name('marcas.show');
Route::get('/marcas/edit/{id}', [MarcasController::class, 'edit'])->name('marcas.edit');
Route::put('/marcas/{id}', [MarcasController::class, 'update'])->name('marcas.update');
Route::delete('/marcas/{id}', [MarcasController::class, 'destroy'])->name('marcas.destroy');

Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
Route::post('/categorias/store', [CategoriasController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}', [CategoriasController::class, 'show'])->name('categorias.show');
Route::get('/categorias/edit/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
