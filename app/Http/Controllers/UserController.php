<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'cooking_skill' => 'nullable|string',
            'diet_type' => 'nullable|string',
        ]);
        $user = User::create([
            'name' => $validator['name'],
            'email' => $validator['email'],
            'password' => Hash::make($validator['password']),
            'cooking_skill' => $validator['cooking_skill'] ?? null,
            'diet_type' => $validator['diet_type'] ?? null,
            'created_at' => now(),
        ]);
        return redirect()->intended('/');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json(
                [
                    'error' => 'Wrong credentials',
                ],
                401
            );
        }
        $user = Auth::user();
        return redirect()->intended('/home');
    }
    public function show($id)
    {
        try {
            $user = User::with('recipes')->findOrFail($id);
            return response()->json($user, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'User not found',
                'message' => $e->getMessage(),
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'password' => 'nullable|string|min:6|confirmed',
            'cooking_skill' => 'required|in:Beginner,Intermediate,Advanced',
            'diet_type' => 'required|in:None,Vegan,Vegetarian,Keto,Other,Paleo,LowCarb',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cooking_skill = $request->cooking_skill;
        $user->diet_type = $request->diet_type;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }
}