<?php

namespace App\Http\Controllers;

use App\Models\Allergie;
use Illuminate\Http\Request;

class AllergyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $allergie = Allergie::create([
            'name' => $validated['name'],
        ]);
        return response()->json($allergie, 201);
    }
}
