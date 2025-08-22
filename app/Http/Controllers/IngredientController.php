<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function show()
    {
        $ingredient = Ingredient::all()->map(function ($recipe) {
            return $recipe;
        });
        return response()->json($ingredient, 200);
    }
    public function ingredientView($recipeId)
    {
        $recipe = Recipe::findOrFail($recipeId);
        $ingredients = Ingredient::all();
        session(['recipe_id' => $recipeId]);
        return view('pages.IngredientView', compact('recipe', 'ingredients'));
    }
}
