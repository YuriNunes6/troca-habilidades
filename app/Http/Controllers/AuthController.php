<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showCadastro() {

        $skills = Skill::all();
        return view('users.create', compact('skills'));
    
    }

    public function cadastroSubmit(Request $request)
    {

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    if ($request->has('skills')) {
        $user->skills()->attach($request->skills);
    }

    return redirect()->route('login')->with('success', 'Conta criada com sucesso! Faça login.');
}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Credenciais inválidas');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
