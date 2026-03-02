@extends('layouts.app')

@section('title', 'Editar Skills')

@section('content')
<div class="p-6 bg-white rounded shadow max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Skills</h1>

    <form method="POST" action="{{ route('user.skills.update') }}">
        @csrf
        @method('PUT')

        @foreach($skills as $skill)
        <div class="mb-3 border-b pb-2">
            <label class="font-medium">
                <input type="checkbox" name="skills[]" value="{{ $skill->id }}"
                       @if(auth()->user()->skills->contains($skill->id)) checked @endif>
                {{ $skill->name }}
            </label>

            <select name="nivel_academico[{{ $skill->id }}]" class="ml-2 border rounded px-2 py-1">
                <option value="regular" @if(optional(auth()->user()->skills->find($skill->id))->pivot->nivel_academico == 'regular') selected @endif>Regular</option>
                <option value="intermediario" @if(optional(auth()->user()->skills->find($skill->id))->pivot->nivel_academico == 'intermediario') selected @endif>Intermediário</option>
                <option value="avancado" @if(optional(auth()->user()->skills->find($skill->id))->pivot->nivel_academico == 'avancado') selected @endif>Avançado</option>
            </select>
        </div>
        @endforeach

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
    </form>
</div>
@endsection