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

    public function crearCategoria(Request $request)
    {
        $datos = $request->all();

        $item = new Categoria();
        $item->nombre = $datos['nombre'];
        $item->estado = $datos['estado'];
        $item->descripcion = $datos['descripcion'];
        $item->categoria_padre = $datos['categoria_padre'];
        $item->save();

        return response()->json(['status' => 'success', 'message' => 'Nueva categoria añadida', 'data' => $item]);
    }

    public function modificarCategoria(Request $request)
    {
        $datos = $request->all();

        $item = Categoria::where('id', $datos['categoria_id'])->first();
        $item->nombre = $datos['nombre'];
        $item->estado = $datos['estado'];
        $item->descripcion = $datos['descripcion'];
        $item->categoria_padre = $datos['categoria_padre'];
        $item->save();

        return response()->json(['status' => 'success', 'message' => 'Categoria modificada', 'data' => $item]);
    }

    public function eliminarCategoria(Request $request)
    {
        $datos = $request->all();

        $item = Categoria::where('id', $datos['categoria_id'])->first();
        $item->delete();

        return response()->json(['status' => 'success', 'message' => 'Categoria eliminada']);
    }
}
