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
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();
    
        $categories = DB::table('categories')->get();
    
        return response()->json(['products' => $products, 'categories' => $categories]);
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

        $products = $this->getProducts();
        $categories = $this->getCategories();

        return json_encode(['products' => $products, 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $categories = $this->getCategories();

        return json_encode(['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    $product->name = $request->name;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->category_id = $request->category_id;
    $product->save();

    return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        $products = $this->getProducts();
        $categories = $this->getCategories();

        return json_encode(['products' => $products, 'categories' => $categories, 'success' => true]);
    }

    /**
     * Retrieve all products from the database.
     */
    private function getProducts()
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();
    }

    /**
     * Retrieve all categories from the database.
     */
    private function getCategories()
    {
        return DB::table('categories')->get();
    }
}
