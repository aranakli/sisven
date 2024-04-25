<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Trae todos los registros en el objeto categorias
        $categorias = DB::table('categories')
        ->select('categories.*')
        ->get();
        return view('categoria.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Crear una nueva categoria
        return view('categoria.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda los cambios de la categoria
        //El codigo de la categoria  es autoincremental
        $categoria = new Categoria();
        $categoria->name = $request->name;
        $categoria->description = $request->descripcion;
        $categoria->save();
        $categorias = DB::table('categories')
            ->select('categories.*')
            ->get();
        return view('categoria.index', ['categorias' => $categorias]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
