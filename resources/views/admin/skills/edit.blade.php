@extends('layouts.app')

@section('title', 'Editar Skill')

@section('content')
<div class="p-6 bg-white rounded shadow max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Skill</h1>

    <form method="POST" action="{{ route('admin.skills.update', $skill->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Nome</label>
            <input type="text" name="name" value="{{ $skill->name }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Descrição</label>
            <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ $skill->description }}</textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
    </form>
</div>
@endsection