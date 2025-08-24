<?php

namespace App\Http\Controllers;

use App\Models\UserXRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = auth()->user();
        if (!$user) {
            return redirect('/')->with('error', 'Debes iniciar sesión.');
        }
        $recipes = $user->favorites()->get();
        return view('pages.FavoritesView', compact('recipes'));
    }
}
