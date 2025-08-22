<?php

namespace App\Http\Controllers;

use App\Models\UserXAllergy;
use Illuminate\Http\Request;

class UserXAllergyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'allergy_id' => 'required|integer|exists:allergies,id'
        ]);
        $userxallergy = UserXAllergy::create([
            'user_id' => $validated['user_id'],
            'allergy_id' => $validated['allergy_id'],
        ]);
        return response()->json($userxallergy, 201);
    }
}
