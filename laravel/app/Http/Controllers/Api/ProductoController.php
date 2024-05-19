<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PrecioProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductoController extends Controller
{
    public function crearProducto(Request $request)
    {
        $datos = $request->all();

        $codigo = $this->generarCodigoProducto($datos['nombre_producto']);

        $producto = new Producto();
        $producto->codigo_producto = $codigo;
        $producto->marca_de_producto_id = $datos['marca_de_producto_id'];
        $producto->categoria_id = $datos['categoria_id'];
        $producto->modelo = $datos['modelo'];
        $producto->nombre = $datos['nombre_producto'];
        $producto->stock = $datos['stock_inicial'];
        $producto->save();

        $precio_producto = new PrecioProducto();
        $precio_producto->producto_id = $producto->id;
        $precio_producto->fecha = now();
        $precio_producto->valor = $datos['valor'];
        $precio_producto->save();

        // Obtén el último precio registrado para mostrarlo en la respuesta
        $ultimoPrecio = $producto->precios()->orderBy('fecha', 'desc')->first();

        $resultado = [
            'id' => $producto->id,
            'codigo_de_producto' => $producto->codigo_producto,
            'stock' => $producto->stock,
            'valor_actual' => $ultimoPrecio->valor,
        ];

        return response()->json([
            'success' => 'success',
            'message' => 'Producto creado con éxito',
            'data' => $resultado
        ]);
    }

    public function obtenerProducto(Request $request)
    {
        $datos = $request->all();
        $producto = Producto::where('codigo_producto', $datos['codigo_producto'])->first();

        $precios = [];
        foreach ($producto->precios as $precio) {
            $precios[] = [
                'valor' => $precio->valor,
                'fecha' => $precio->fecha
            ];
        }

        $resultado = [
            'id' => $producto->id,
            'codigo_producto' => $producto->codigo_producto,
            'marca' => $producto->marca->nombre,
            'stock' => $producto->stock,
            'modelo' => $producto->modelo,
            'nombre' => $producto->nombre,
            'precios' => $precios
        ];
        return $resultado;
    }


    public function listarTodosLosProductos()
    {
        $productos = Producto::all();

        $resultado = [];

        foreach ($productos as $producto) {
            $resultado[] = [
                'codigo_producto' => $producto->codigo_producto,
                'nombre' => $producto->nombre,
                'modelo' => $producto->modelo,
                'marca' => $producto->marca->nombre,
            ];
        }

        return $resultado;
    }

    public function cambiarCategoriasProducto(Request $request)
    {
        $datos = $request->all();

        $producto = Producto::where('codigo_producto', $datos['codigo_producto'])->first();
        $producto->categoria_id = $datos['categoria_id'];
        $producto->save();

        $precios = [];
        foreach ($producto->precios as $precio) {
            $precios[] = [
                'valor' => $precio->valor,
                'fecha' => $precio->fecha
            ];
        }

        $resultado = [
            'id' => $producto->id,
            'codigo_producto' => $producto->codigo_producto,
            'marca' => $producto->marca->nombre,
            'stock' => $producto->stock,
            'modelo' => $producto->modelo,
            'nombre' => $producto->nombre,
            'precios' => $precios
        ];
        return response()->json(['status' => 'success', 'message' => 'Categoria del producto modificada', 'data' => $resultado]);
    }


    public function eliminarProducto(Request $request){
        $datos = $request->all();
        $producto = Producto::where('codigo_producto', $datos['codigo_producto'])->first();
        $producto->delete();

        return response()->json(['status' => 'success', 'message' => 'Producto eliminado']);
    }

    private function generarCodigoProducto($nombreProducto)
    {
        $nombreLimpio = strtoupper(preg_replace('/\s+/', '', $nombreProducto));
        $primerosTresCaracteres = (strlen($nombreLimpio) >= 3) ? substr($nombreLimpio, 0, 3) : $nombreLimpio;
        $timestamp = time();
        return $primerosTresCaracteres . '-' . $timestamp;
    }
}
