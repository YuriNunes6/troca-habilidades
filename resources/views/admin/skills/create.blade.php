@extends('layouts.app')

@section('title', 'Cadastrar Skill')

@section('content')
<div class="admin-skill-container">
    <h1 class="text-2xl font-bold mb-4">Cadastrar Nova Skill</h1>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.skills.store') }}" method="POST" class="form-skill">
        @csrf

        <label for="name" class="font-semibold">Nome da Skill</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="input-field">
        @error('name')
            <div class="alert alert-error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn-submit mt-4">Cadastrar Skill</button>
    </form>

    <a href="{{ route('skills.index') }}" class="btn-back mt-4 inline-block">← Voltar para Skills</a>
</div>

<style>
    .admin-skill-container{
        max-width: 500px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .form-skill {
        display: flex;
        flex-direction: column;
        margin-top: 12px;
        margin-bottom: 15px;
        gap: 10px;
    }

    .input-field {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-submit {
        padding: 10px;
        background-color: #2563eb;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #1e40af;
    }

    .btn-back {
        color: #2563eb;
        text-decoration: none;
    }

    .btn-back:hover {
        text-decoration: underline;
    }

    .alert-error {
        color: red;
        font-size: 0.9rem;
    }

    .alert-success {
        color: green;
        font-size: 0.95rem;
    }
</style>
@endsection