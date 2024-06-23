<?php

namespace App\Http\Controllers\Web;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\PrecioProducto;
use App\Models\MarcaDeProducto;
use App\Http\Controllers\Controller;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Producto::with(['categoria', 'marca', 'precioActual'])->get(); // Carga las relaciones necesarias
        $marcas = MarcaDeProducto::all();
        $categorias = Categoria::all();
        return view('pages.productos.index', compact('items', 'marcas', 'categorias'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->codigo_producto = $this->generarCodigoProducto($request->nombre);
        $producto->categoria_id = $request->categoria; // Asegúrate de que el campo 'categoria' esté en el modelo Producto
        $producto->marca_de_producto_id = $request->marca_de_producto_id;
        $producto->modelo = $request->modelo;
        $producto->stock = $request->stock;
        $producto->save();

        $precio_producto = new PrecioProducto();
        $precio_producto->producto_id = $producto->id;
        $precio_producto->fecha = now();
        $precio_producto->valor = $request->valor;
        $precio_producto->save();

        return redirect()->route('productos.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        $marcas = MarcaDeProducto::all();
        $categorias = Categoria::all();
        return view('pages.productos.edit', compact('producto', 'marcas', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->except('valor'));

        // Crea un nuevo registro de precio
        $precio_producto = new PrecioProducto();
        $precio_producto->producto_id = $producto->id;
        $precio_producto->fecha = now();
        $precio_producto->valor = $request->valor;
        $precio_producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito');
    }


    private function generarCodigoProducto($nombreProducto)
    {
        $nombreLimpio = strtoupper(preg_replace('/\s+/', '', $nombreProducto));
        $primerosTresCaracteres = (strlen($nombreLimpio) >= 3) ? substr($nombreLimpio, 0, 3) : $nombreLimpio;
        $timestamp = time();
        return $primerosTresCaracteres . '-' . $timestamp;
    }
}
