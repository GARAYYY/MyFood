<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cooking_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'difficulty' => 'required|string|in:Facil,Medio,Dificil',
            'created_by' => 'required|integer|exists:users,user_id',
        ], [
            'title.required' => 'El título es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'cooking_time.required' => 'El tiempo de preparación es obligatorio.',
            'cooking_time.integer' => 'El tiempo de preparación debe ser un número.',
            'cooking_time.min' => 'El tiempo debe ser al menos 1 minuto.',
            'servings.required' => 'Las raciones son obligatorias.',
            'servings.integer' => 'Las raciones deben ser un número.',
            'servings.min' => 'Debe haber al menos 1 ración.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'Solo se permiten imágenes JPG, JPEG o PNG.',
            'image.max' => 'La imagen no puede superar los 2 MB.',
            'difficulty.required' => 'Debes seleccionar la dificultad.',
            'difficulty.in' => 'La dificultad seleccionada no es válida.',
            'created_by.required' => 'Falta el creador de la receta.',
            'created_by.exists' => 'El usuario que crea la receta no existe.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path('recipe_images'), $filename);
            $imageUrl = '/recipe_images/' . $filename;
        }
        $recipe = Recipe::create([
            'title' => $validator->validated()['title'],
            'description' => $validator->validated()['description'],
            'cooking_time' => $validator->validated()['cooking_time'],
            'servings' => $validator->validated()['servings'],
            'image_url' => $imageUrl,
            'difficulty' => $validator->validated()['difficulty'],
            'created_by' => $validator->validated()['created_by'],
            'created_at' => now(),
        ]);
        session(['recipe_id' => $recipe->recipe_id]);
        return redirect()->route('ingredient.view', ['recipe' => $recipe->recipe_id]);
    }
    public function indexView()
    {
        $recipes = Recipe::all();
        return view('pages.HomeView', compact('recipes'));
    }
    public function detail($id)
    {
        $recipe = Recipe::with([
            'author',
            'ingredients',
            'instructions'
        ])->findOrFail($id);

        return view('pages.RecipeDetailView', compact('recipe'));
    }
}