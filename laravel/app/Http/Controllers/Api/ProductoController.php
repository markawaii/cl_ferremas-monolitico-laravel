<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function crearProducto()
    {
        $resultado = 'La extraño mas que a nada en el mundo';


        return response()->json([
            'success' => 'success',
            'data' => $resultado
        ]);
    }
}
