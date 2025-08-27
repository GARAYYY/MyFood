<?php

namespace App\Http\Controllers;

use App\Models\RecipeXIngredient;
use Illuminate\Http\Request;

class RecipeXIngredientController extends Controller
{
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'recipe_id' => 'required|exists:recipes,recipe_id',
            'ingredient_ids' => 'required|array|min:1',
            'quantities' => 'required|array',
        ], [
            'recipe_id.required' => 'Falta el identificador de la receta.',
            'recipe_id.exists' => 'La receta seleccionada no existe.',
            'ingredient_ids.required' => 'Debes seleccionar al menos un ingrediente.',
            'ingredient_ids.array' => 'El formato de los ingredientes es incorrecto.',
            'ingredient_ids.min' => 'Selecciona al menos un ingrediente.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
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
            ]);
        }
        return redirect("/step/{$recipeId}");
    }
}
