<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Trae todos los registros en el objeto categorias
        $categories = DB::table('categories')
            ->select('categories.*')
            ->get();
        return view('categorie.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Crear una nueva categoria
        return view('categorie.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda los cambios de la categoria
        //El codigo de la categoria  es autoincremental
        $categorie = new Categorie();
        $categorie->name = $request->name;
        $categorie->description = $request->description;
        $categorie->save();
        $categories = DB::table('categories')
            ->select('categories.*')
            ->get();
        return view('categorie.index', ['categories' => $categories]);
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
        //Edita una categorie
        $categorie = Categorie::find($id);
        return view('categorie.edit', ['categorie' => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorie = Categorie::find($id);
        $categorie->name = $request->name;
        $categorie->description = $request->description;
        $categorie->save();

        $categories = DB::table('categories')
            ->select('categories.*')
            ->get();
        return view('categorie.index', ['categories' => $categories]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Elimina una paquete
            $categorie = Categorie::find($id);
            $categorie->delete();
            $categories = DB::table('categories')
                ->select('categories.*')
                ->get();
            return view('categorie.index', ['categories' => $categories]);
        } catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                // Este código de error específico indica una violación de integridad referencial
                $categories = DB::table('categories')
                    ->select('categories.*')
                    ->get();
                return view('categorie.index', ['categories' => $categories, 'error' => 'No se puede eliminar el categoria debido a que existen productos asociados.']);
            } else {
                // Otros errores de la base de datos
                $categories = DB::table('categories')
                    ->select('categories.*')
                    ->get();
                return view('categorie.index', ['categories' => $categories, 'error' => 'Error en la base de datos: ' . $e->getMessage()]);
            }
        }
    }
}
