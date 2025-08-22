<?php

namespace App\Http\Controllers;

use App\Models\RecipeXIngredient;
use Illuminate\Http\Request;

class RecipeXIngredientController extends Controller
{
    public function store(Request $request)
    {
        $recipeId = $request->input('recipe_id');
        $ingredientIds = $request->input('ingredient_ids', []);
        $quantities = $request->input('quantities', []);
        foreach ($ingredientIds as $ingredientId) {
            $quantity = $quantities[$ingredientId] ?? null;
            if (!$quantity)
                continue;
            RecipeXIngredient::create([
                'recipe_id' => $recipeId,
                'ingredient_id' => $ingredientId,
                'quantity' => $quantity,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect("/step/{$recipeId}");
    }
}
