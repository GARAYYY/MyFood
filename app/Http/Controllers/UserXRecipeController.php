<?php

namespace App\Http\Controllers;

use App\Models\UserXRecipe;
use Illuminate\Http\Request;

class UserXRecipeController extends Controller
{
    public function store(Request $request, $id)
    {
        $user_id = $request->user_id;
        $exists = UserXRecipe::where('user_id', $user_id)
            ->where('recipe_id', $id)
            ->exists();
        if (!$exists) {
            UserXRecipe::create([
                'user_id' => $user_id,
                'recipe_id' => $id
            ]);
            return response()->json(['message' => 'Added to favourites'], 201);
        }
        return response()->json(['message' => 'Something went wrong'], 400);
    }
    public function favouritesButton(Request $request, $id)
    {
        $user_id = $request->query('user_id');
        $exists = UserXRecipe::where('user_id', $user_id)
            ->where('recipe_id', $id)
            ->exists();
        return response()->json(['exists' => $exists]);
    }
    public function show($id)
    {
        $recipes = UserXRecipe::where('user_id', $id)
            ->with('recipe') // carga la receta asociada
            ->get()
            ->pluck('recipe'); // extrae solo las recetas
        return response()->json($recipes);
    }
}
