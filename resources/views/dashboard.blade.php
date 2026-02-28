@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <h1>Bem-vindo, {{ auth()->user()->name }}!</h1>
    <p>Explore suas sessões, habilidades e interações abaixo:</p>

    <div class="cards">
        <a href="{{ route('users.index') }}" class="card">
            <div class="card-icon">👥</div>
            <div class="card-text">Usuários</div>
        </a>
        <a href="{{ route('skills.index') }}" class="card">
            <div class="card-icon">🛠️</div>
            <div class="card-text">Skills</div>
        </a>
        <a href="{{ route('sessions.index') }}" class="card">
            <div class="card-icon">⏱️</div>
            <div class="card-text">Sessões</div>
        </a>
        <a href="{{ route('users.profile') }}" class="card">
            <div class="card-icon">👤</div>
            <div class="card-text">Meu Perfil</div>
        </a>
        @if(auth()->user()->is_admin)
            <a href="{{ route('admins.index') }}" class="card">
                <div class="card-icon">⭐</div>
                <div class="card-text">Admin</div>
            </a>
        @endif
    </div>
</div>

<style>
.dashboard-container {
    max-width: 1000px;
    margin: 50px auto;
    text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.dashboard-container h1 {
    font-size: 2.5rem;
    color: #333;
}

.dashboard-container p {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 40px;
}

.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 25px;
}

.card {
    background-color: #007BFF;
    color: white;
    padding: 30px 20px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: bold;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s, background-color 0.3s;
}

.card:hover {
    background-color: #0056b3;
    transform: translateY(-5px);
}

.card-icon {
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.card-text {
    font-size: 1.1rem;
}
</style>
@endsection