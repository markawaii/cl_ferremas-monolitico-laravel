<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function todasLasCategorias()
{
    $categorias_padre = Categoria::whereNull('categoria_padre')->with('subcategorias')->get();

    $resultado = [];

    foreach ($categorias_padre as $categoria) {
        $categoria_data = [
            'id' => $categoria->id,
            'nombre' => $categoria->nombre,
            'activo' => $categoria->estado ? true : false,
            'subcategorias' => [],
        ];

        foreach ($categoria->subcategorias as $subcategoria) {
            $categoria_data['subcategorias'][] = [
                'id' => $subcategoria->id,
                'nombre' => $subcategoria->nombre,
                'activo' => $subcategoria->estado ? true : false,
            ];
        }

        $resultado[] = $categoria_data;
    }

    return $resultado;
}
}
