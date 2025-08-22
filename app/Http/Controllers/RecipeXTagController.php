<?php

namespace App\Http\Controllers;

use App\Models\RecipeXTag;
use Illuminate\Http\Request;

class RecipeXTagController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipe_id' => 'required|integer|exists:recipes,id',
            'tag_id' => 'required|integer|exists:tags,id'
        ]);
        $recipextag = RecipeXTag::create([
            'recipe_id' => $validated['recipe_id'],
            'tag_id' => $validated['tag_id'],
        ]);
        return response()->json($recipextag, 201);
    }
}
