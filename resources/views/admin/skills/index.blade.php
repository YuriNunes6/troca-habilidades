@extends('layouts.app')

@section('title', 'Gerenciar Skills')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Skills</h1>

    <a href="{{ route('admin.skills.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Adicionar Skill
    </a>

    <ul class="space-y-4">
        @foreach($skills as $skill)
        <li class="bg-white p-4 rounded shadow flex justify-between items-center">
            <div>
                <h2 class="font-bold">{{ $skill->name }}</h2>
                <p>{{ $skill->description }}</p>
            </div>
            <div class="space-x-2">
                <a href="{{ route('admin.skills.edit', $skill->id) }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Editar</a>
                <form method="POST" action="{{ route('admin.skills.destroy', $skill->id) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                            onclick="return confirm('Tem certeza que deseja remover esta skill?')">Remover</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection