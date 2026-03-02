@extends('layouts.app')

@section('content')
<div class="cadastro-container">
    <h1>Cadastro de Usuário</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form class="form-cadastro" action="{{ route('cadastro.submit') }}" method="POST">
        @csrf
        <label>Nome</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div class="alert alert-error">{{ $message }}</div> @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div class="alert alert-error">{{ $message }}</div> @enderror

        <label>Senha</label>
        <input type="password" name="password">
        @error('password') <div class="alert alert-error">{{ $message }}</div> @enderror

        <label>Confirmar Senha</label>
        <input type="password" name="password_confirmation">

        <label>Habilidades</label>
        <select name="skills">
            <option value="" selected disabled>Selecione uma habilidade</option>
            @foreach($skills as $skill)
                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn-cadastrar">Cadastrar</button>
    </form>

    <!-- Card para cadastro de admin -->
    <div class="admin-card">
        <h3>Deseja entrar como Administrador?</h3>
        <p>Admins têm acesso à gestão de usuários e habilidades.</p>
        <a href="{{ route('login') }}" class="btn-admin">Entrar como Admin</a>
    </div>
</div>

<style>
/* Container geral */
.cadastro-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 25px;
    display: flex;
    flex-direction: column;
    gap: 30px;
    background-color: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Formulário */
.form-cadastro {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-cadastro label {
    font-weight: 600;
}

.form-cadastro input,
.form-cadastro select {
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    width: 100%;
}

.btn-cadastrar {
    padding: 12px;
    background-color: #2d89ef;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease;
}
.btn-cadastrar:hover {
    background-color: #1b5fa7;
}

/* Alertas */
.alert-success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 5px;
}
.alert-error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
}

/* Card Admin */
.admin-card {
    text-align: center;
    padding: 20px;
    background-color: #eef3f7;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.btn-admin {
    display: inline-block;
    margin-top: 15px;
    padding: 12px 25px;
    background-color: #1b5fa7;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
}
.btn-admin:hover {
    background-color: #14437a;
    transform: translateY(-2px);
}
</style>
@endsection