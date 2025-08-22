<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
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
    public function indexView($recipe_id)
    {
        $ingredients = Ingredient::all();
        return view('pages.IngredientView', compact('ingredients', 'recipe_id'));
    }
}
