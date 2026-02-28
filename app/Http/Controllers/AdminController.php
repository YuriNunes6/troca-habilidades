<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Mostrar página de cadastro
    public function showCreate()
    {
        return view('admins.create');
    }

    // Criar novo admin
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => true, // marca como admin
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin criado com sucesso!');
    }

    // Listar admins
    public function index()
    {
        $admins = User::where('is_admin', true)->get();
        return view('admins.index', compact('admins'));
    }

    // Editar admin
    public function edit(User $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
        ]);

        $admin->update($request->only('name', 'email'));

        return redirect()->route('admins.index')->with('success', 'Admin atualizado com sucesso!');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin removido com sucesso!');
    }
}