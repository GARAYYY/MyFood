<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function stepView($recipeId)
    {
        session(['recipe_id' => $recipeId]);
        return view('pages.StepView', compact('recipeId'));
    }
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'recipe_id' => 'required|exists:recipes,recipe_id',
            'instructions' => 'required|array|min:1',
            'instructions.*' => 'required|string|min:5',
        ], [
            'recipe_id.required' => 'La receta es obligatoria.',
            'recipe_id.exists' => 'La receta seleccionada no existe.',
            'instructions.required' => 'Debes añadir al menos una instrucción.',
            'instructions.array' => 'Las instrucciones deben enviarse en formato de lista.',
            'instructions.min' => 'Debes escribir al menos una instrucción.',
            'instructions.*.required' => 'Ningún paso puede estar vacío.',
            'instructions.*.string' => 'Cada instrucción debe ser un texto.',
            'instructions.*.min' => 'Cada paso debe tener al menos 5 caracteres.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $recipeId = $request->input('recipe_id');
        $instructions = $request->input('instructions', []);
        foreach ($instructions as $index => $description) {
            if (trim($description) === '')
                continue;
            Instruction::create([
                'recipe_id' => $recipeId,
                'step_number' => $index + 1,
                'description' => $description,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        session()->forget('recipe_id');
        return redirect('/home')->with('success', '¡Receta creada con éxito!');
    }
}
