<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use App\Mail\CustomEmail;
use Illuminate\Support\Facades\Mail;


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
        return redirect()->route('home');
    }
    public function show()
    {
        $user = auth()->user()->load('recipes');
        return view('pages.ProfileView', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'cooking_skill' => 'required|string',
            'diet_type' => 'required|string',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cooking_skill = $request->cooking_skill;
        $user->diet_type = $request->diet_type;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    public function sendCustomEmails(Request $request)
    {
        $admin = User::where('role', 1)->first();
        if (!$admin)
            return "No autorizado";
        $subject = $request->input('subject');
        $content = $request->input('content');
        $users = User::all();
        foreach ($users as $user) {
            $messageBody = [
                'title' => "Hola, {$user->name}!",
                'content' => $content
            ];
            Mail::to($user->email)->send(new CustomEmail($subject, $messageBody));
        }
        return back()->with('success', 'Correos enviados a todos los usuarios.');
    }
    public function showSendEmailForm()
    {
        return view('pages.SendMailView');
    }
}