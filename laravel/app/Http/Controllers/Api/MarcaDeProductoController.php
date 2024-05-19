<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MarcaDeProducto;
use Illuminate\Http\Request;

class MarcaDeProductoController extends Controller
{
    public function obtenerTodosLosProductos(){
        $Marcas = MarcaDeProducto::all();

        $resultado = [];

        foreach ($Marcas as $Marca){
            $resultado[] = [
                'id' => $Marca->id,
                'nombre' => $Marca->nombre,
                'activo' => $Marca->activo ? true:false,
            ];
        }

        return $resultado;
    }
}
