<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource categories.
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->select('categories.*')
            ->get();
        return json_encode(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage categorie.
     */
    public function store(Request $request)
    {
        $categorie = new Categorie();
        $categorie->name = $request->name;
        $categorie->description = $request->description;
        $categorie->save();

        return json_encode(['categorie' => $categorie]);
    }

    /**
     * Display the specified resource categorie.
     */
    public function show( $id)
    {
        $categorie = Categorie::find($id);
        return json_encode(['categorie' => $categorie]);
    }

    /**
     * Update the specified resource in storage categorie.
     */
    public function update(Request $request,  $id)
    {
        $categorie = Categorie::find($id);
        $categorie->name = $request->name;
        $categorie->description = $request->description;
        $categorie->save();
        return json_encode(['categorie' => $categorie]);
    }

    /**
     * Remove the specified resource from storage categories.
     */
    public function destroy( $id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        $categories = DB::table('categories')
            ->select('categories.*')
            ->get();
        return json_encode(['categories' => $categories, 'success' => true]);
    }
}
