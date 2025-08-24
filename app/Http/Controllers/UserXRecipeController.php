<?php

namespace App\Http\Controllers;

use App\Models\UserXRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserXRecipeController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id(); // usuario autenticado
        $recipeId = $request->input('recipe_id');
        // Verificar si ya está en favoritos
        $exists = UserXRecipe::where('user_id', $userId)
            ->where('recipe_id', $recipeId)
            ->exists();
        if (!$exists) {
            UserXRecipe::create([
                'user_id' => $userId,
                'recipe_id' => $recipeId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect()->back()->with('success', 'Recipe added to favorites!');
    }
}
