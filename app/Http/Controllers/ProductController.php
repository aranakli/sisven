<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
  
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function
destroy(string
    $id)
    
        {
    
            try {
    
                // Elimina una paquete
    
                $categorie = Categorie::find($id);
    
                $categorie->delete();
    
                $categories =
    DB::table('categories')
    
                    ->select('categories.*')
    
                    ->get();
    
                return
    view('categorie.index', ['categories'
     => $categories]);
    
            } catch (\Exception
    $e) {
    
                if ($e->getCode()
     === '23000') {
    
                    // Este código de error específico indica una violación de integridad referencial
    
                    $categories =
    DB::table('categories')
    
                        ->select('categories.*')
    
                        ->get();
    
                    return
    view('categorie.index', ['categories' => $categories, 'error' => 'No se puede eliminar el categoria debido a que existen productos asociados.']);
    
                } else {
    
                    // Otros errores de la base de datos
    
                    $categories =
    DB::table('categories')
    
                        ->select('categories.*')
    
                        ->get();
    
                    return
    view('categorie.index', ['categories'
     => $categories,
    'error' =>
    'Error en la base de datos: ' .
    $e->getMessage()]);
    
                }
    
            }
    
        }
}

