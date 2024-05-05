<?php

use App\Http\Controllers\Api\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(ProductoController::class)->group(function () {
    Route::post('/producto/crear-producto', 'crearProducto');
    Route::delete('/producto/eliminar-producto', 'eliminarProducto');
    Route::put('/producto/cambiar-precio', 'cambiarPrecio');
    Route::get('/producto/obtener-producto', 'obtenerProducto');
    Route::put('/producto/modificar-producto', 'modificarProducto');
    Route::get('/producto/listar-todos-los-productos', 'listarTodosLosProductos');
});
