<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\MarcaDeProducto;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MarcaDeProducto::all();
        return view('pages.marcas.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $marca = new MarcaDeProducto();
        $marca->nombre = $request->nombre;
        $marca->activo = $request->estado;
        $marca->save();

        return redirect()->route('marcas.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = MarcaDeProducto::find($id);
        return view('pages.marcas.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $marca = MarcaDeProducto::find($id);
        $marca->nombre = $request->nombre;
        $marca->activo = $request->estado;
        $marca->save();

        return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca = MarcaDeProducto::find($id);
        $marca->delete();
        return redirect()->route('marcas.index');
    }
}
