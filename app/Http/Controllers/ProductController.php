<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie; 
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $products = Product::all();
        $products = DB::table('products')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name')
        ->get();
        return view('products.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')
        ->orderBy('name')
        ->get();

        return view('products.new', ['categories' => $categories]);
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

        return view('products.index', ['products'=>$products]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product= Product::find($id);
        $categories = DB::table('categories')
        ->orderBy('name')
        ->get();

        return view('products.edit', ['categories' => $categories]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
      return view('products.index', ['products' => $products]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        $product->delete();

        $products = DB::table('products')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name')
            ->get();
        return view('products.index', ['products' => $products]);
    }
}
