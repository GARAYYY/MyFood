<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'is_gluten_free' => 'required|boolean',
            'is_vegan' => 'required|boolean'
        ]);
        $ingredient = Ingredient::create([
            'name' => $validated['name'],
            'is_gluten_free' => $validated['is_gluten_free'],
            'is_vegan' => $validated['is_vegan']
        ]);
        return response()->json($ingredient, 201);
    }
    public function show(){
        $ingredient = Ingredient::all()->map(function ($recipe) {
            return $recipe;
        });
        return response()->json($ingredient, 200);
    }
}
