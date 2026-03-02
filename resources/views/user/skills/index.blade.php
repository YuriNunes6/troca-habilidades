@extends('layouts.app')

@section('title', 'Minhas Skills')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Minhas Skills</h1>

    <a href="{{ route('user.skills.edit') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Editar Skills</a>

    <ul class="bg-white rounded shadow p-4 space-y-2">
        @foreach(auth()->user()->skills as $skill)
            <li>
                <strong>{{ $skill->name }}</strong> ({{ $skill->pivot->nivel_academico }}) - {{ $skill->pivot->tempo_experiencia ?? 'N/A' }}
                <p class="text-gray-600">{{ $skill->pivot->description }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection