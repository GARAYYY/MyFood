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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'cooking_skill' => 'nullable|string',
            'diet_type' => 'nullable|string',
        ], [
            'name.required' => 'Debes ingresar tu nombre',
            'email.required' => 'Debes ingresar tu correo',
            'email.email' => 'Ingresa un correo válido',
            'email.unique' => 'Este correo ya está registrado',
            'password.required' => 'Debes ingresar una contraseña',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres e incluir como mínimo 1 minúscula, 1 mayúscula y 1 número',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $validator->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cooking_skill' => $data['cooking_skill'] ?? null,
            'diet_type' => $data['diet_type'] ?? null,
            'role' => 0,
        ]);
        return redirect()->intended('/');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Debes ingresar tu correo',
            'email.email' => 'Ingresa un correo válido',
            'password.required' => 'Debes ingresar una contraseña',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        if (!$token) {
            return redirect()->back()
                ->withErrors(['login_error' => 'Correo o contraseña incorrectos'])
                ->withInput();
        }
        $user = Auth::user();
        return redirect()->route('home');
    }
    public function show()
    {
        $user = auth()->user()->load('recipes');
        return view('pages.ProfileView', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
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