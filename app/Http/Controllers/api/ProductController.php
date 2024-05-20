<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categorie; 
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name')
        ->get();

        return json_encode(['products'=>$products,'categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();

        $products = DB::table('products')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name')
        ->get();

        return json_encode(['products'=>$products,'categories' => $categories]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product= Product::find($id);
        $categories = DB::table('categories')
        ->orderBy('name')
        ->get();

        return json_encode(['products'=>$products,'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product= Product::find($id);
       
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();
        $products = DB::table('products')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name')
        ->get();

        return json_encode(['products'=>$products,'categories' => $categories]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product= Product::find($id);
        $product->delete();

        $products = DB::table('products')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name')
            ->get();
            return json_encode(['products'=>$products,'categories' => $categories, 'success' => true]);
        }
}
