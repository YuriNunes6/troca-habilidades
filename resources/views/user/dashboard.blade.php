@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Bem-vindo, {{ auth()->user()->name }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold mb-2">Minhas Skills</h2>
            <a href="{{ route('skills.index') }}" class="text-blue-600 hover:underline">Ver todas</a>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold mb-2">Minhas Sessões</h2>
            <a href="{{ route('sessions.index') }}" class="text-blue-600 hover:underline">Ver sessões</a>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold mb-2">Solicitações Pendentes</h2>
            <a href="{{ route('requests.create') }}" class="text-blue-600 hover:underline">Criar nova</a>
        </div>
    </div>
</div>
@endsection