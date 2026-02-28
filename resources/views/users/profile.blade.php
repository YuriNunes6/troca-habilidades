@extends('layouts.app')

@section('content')
<h1>Perfil de {{ $user->name }}</h1>

<p><strong>Email:</strong> {{ $user->email }}</p>

<h3>Skills</h3>
<ul>
    @foreach($user->skills as $skill)
        <li>{{ $skill->nome }} - {{ $skill->descricao }} ({{ $skill->pivot->nivel_academico ?? 'regular' }})</li>
    @endforeach
</ul>

@if(auth()->id() === $user->id)
    <a href="{{ route('users.edit', $user->id) }}">Editar Perfil</a>
@endif
@endsection