<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $tag = Tag::create([
            'name' => $validated['name'],
        ]);
        return response()->json($tag, 201);
    }
}
