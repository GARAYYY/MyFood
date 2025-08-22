<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipe_id' => 'required|integer|exists:recipes,recipe_id',
            'step_number' => 'required|integer',
            'description' => 'required|string',
        ]);
        $instruction = Instruction::create([
            'recipe_id' => $validated['recipe_id'],
            'step_number' => $validated['step_number'],
            'description' => $validated['description'],
        ]);
        return response()->json($instruction, 201);
    }}
