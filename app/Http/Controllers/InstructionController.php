<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function stepView($recipeId)
    {
        session(['recipe_id' => $recipeId]); // Guardamos en sesión
        return view('pages.StepView', compact('recipeId'));
    }
    public function store(Request $request)
    {
        $recipeId = $request->input('recipe_id');
        $instructions = $request->input('instructions', []);
        foreach ($instructions as $index => $description) {
            if (trim($description) === '')
                continue; // Saltar campos vacíos
            Instruction::create([
                'recipe_id' => $recipeId,
                'step_number' => $index + 1,
                'description' => $description,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        session()->forget('recipe_id');
        return redirect('/home')->with('success', 'Recipe added successfully!');
    }
}
