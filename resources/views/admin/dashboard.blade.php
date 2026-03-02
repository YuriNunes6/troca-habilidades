@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Painel do Administrador</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold mb-2">Usuários</h2>
            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">Gerenciar</a>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold mb-2">Skills</h2>
            <a href="{{ route('admin.skills.index') }}" class="text-blue-600 hover:underline">Gerenciar</a>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold mb-2">Administradores</h2>
            <a href="{{ route('admin.admins.index') }}" class="text-blue-600 hover:underline">Gerenciar</a>
        </div>
    </div>
</div>
@endsection