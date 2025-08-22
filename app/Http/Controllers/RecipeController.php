<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cooking_time' => 'required|integer',
            'servings' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'difficulty' => 'required|in:easy,medium,hard',
            'created_by' => 'required|integer|exists:users,user_id',
        ]);
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipes', 'public');
            $imageUrl = asset('storage/' . $path);
        }
        $recipe = Recipe::create([
            'title' => $validator['title'],
            'description' => $validator['description'],
            'cooking_time' => $validator['cooking_time'],
            'servings' => $validator['servings'],
            'image_url' => $imageUrl,
            'difficulty' => $validator['difficulty'],
            'created_by' => $validator['created_by'],
            'created_at' => now()
        ]);
        session(['recipe_id' => $recipe->id]);
        return redirect()->route('ingredient.view', ['recipe' => $recipe->id]);
    }
    public function indexView()
    {
        $recipes = Recipe::all();
        return view('pages.HomeView', compact('recipes'));
    }
}