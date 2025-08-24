<?php

namespace App\Http\Controllers;

use App\Models\UserXRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class UserXRecipeController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        $recipeId = $request->input('recipe_id');
        $exists = UserXRecipe::where('user_id', $userId)
            ->where('recipe_id', $recipeId)
            ->exists();
        if (!$exists) {
            UserXRecipe::create([
                'user_id' => $userId,
                'recipe_id' => $recipeId,
            ]);
        }
        return redirect()->back()->with('success', 'Recipe added to favorites!');
    }
    public function showFavorites()
    {
        $userId = Auth::id(); // Usuario logueado
        $favoriteRecipes = Recipe::whereIn('recipe_id', function ($query) use ($userId) {
            $query->select('recipe_id')
                ->from('user_x_recipes')
                ->where('user_id', $userId);
        })->get();
        return view('pages.FavoritesView', ['recipes' => $favoriteRecipes]);
    }
}
