@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1>Login</h1>

    @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required placeholder="Digite seu email">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required placeholder="Digite sua senha">
        </div>

        <button type="submit" class="btn-submit">Entrar</button>
    </form>
</div>

<style>
.form-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 25px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}

h1 { text-align: center; color: #007BFF; margin-bottom: 20px; }

.form-group { margin-bottom: 15px; }
label { font-weight: bold; color: #333; display: block; margin-bottom: 5px; }
input { width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc; }

.btn-submit {
    width: 100%;
    padding: 12px;
    background-color: #007BFF;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}
.btn-submit:hover { background-color: #0056b3; }

.alert.error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
}
</style>
@endsection