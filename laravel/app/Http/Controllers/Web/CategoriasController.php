<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Categoria::all();
        return view('pages.categorias.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->estado = $request->estado;
        $categoria->descripcion = $request->descripcion;
        $categoria->categoria_padre = $request->parent_id;
        $categoria->save();

        return redirect()->route('categorias.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categorias = Categoria::all();
        $categoria = Categoria::find($id);
        return view('pages.categorias.edit', compact('categoria','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->estado = $request->estado;
        $categoria->descripcion = $request->descripcion;
        $categoria->categoria_padre = $request->parent_id;
        $categoria->save();

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria =  Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
