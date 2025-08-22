<?php

namespace App\Http\Controllers;

use App\Models\RecipeXIngredient;
use Illuminate\Http\Request;

class RecipeXIngredientController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ingredient_id' => 'required|integer|exists:ingredients,ingredient_id',
            'recipe_id' => 'required|integer|exists:recipes,recipe_id',
            'quantity' => 'required|numeric'
        ]);
        $recipexingredient = RecipeXIngredient::create([
            'ingredient_id' => $validated['ingredient_id'],
            'recipe_id' => $validated['recipe_id'],
            'quantity' => $validated['quantity'],
        ]);
        return response()->json($recipexingredient, 201);
    }
}
