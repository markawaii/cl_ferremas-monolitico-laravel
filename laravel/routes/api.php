<?php

use App\Http\Controllers\Api\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(ProductoController::class)->group(function () {
    Route::get('/producto/listar-todos-los-productos', 'listarTodosLosProductos');
    Route::get('/producto/obtener-producto', 'obtenerProducto');
    Route::post('/producto/crear-producto', 'crearProducto');
    Route::post('/producto/nuevo-precio-de-producto', 'nuevoPrecio');
    Route::put('/producto/modificar-producto', 'modificarProducto');
    Route::delete('/producto/eliminar-producto', 'eliminarProducto');
});
