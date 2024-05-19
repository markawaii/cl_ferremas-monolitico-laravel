<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MarcaDeProducto;
use Illuminate\Http\Request;

class MarcaDeProductoController extends Controller
{
    public function obtenerTodasLasMarcas(){
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

    public function crearMarca(Request $request){
        $datos = $request->all();

        $item = new MarcaDeProducto();
        $item->nombre = $datos['nombre'];
        $item->activo = $datos['activo'];
        $item->save();

        return response()->json(['status' => 'success', 'message' => 'Nueva marca añadida', 'data' => $item]);
    }


    public function modificarMarca(Request $request){
        $datos = $request->all();

        $item = MarcaDeProducto::where('id', $datos['marca_id'])->first();
        $item->nombre = $datos['nombre'];
        $item->save();

        return response()->json(['status' => 'success', 'message' => 'La marca fue modificada', 'data' => $item]);
    }


    public function eliminarMarca(Request $request){
        $datos = $request->all();

        $item = MarcaDeProducto::where('id', $datos['marca_id'])->first();
        $item->delete();

        return response()->json(['status' => 'success', 'message' => 'La marca fue eliminada', 'data' => $item]);
    }
}
