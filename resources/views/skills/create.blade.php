@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1>Cadastrar Nova Habilidade</h1>
    <p>Adicione uma nova habilidade que os usuários poderão escolher</p>

    <!-- Mensagens -->
    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('skills.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome da Habilidade</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Inglês" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" placeholder="Descreva a habilidade..." required>{{ old('descricao') }}</textarea>
        </div>

        <button type="submit" class="btn-submit">Cadastrar Habilidade</button>
    </form>
</div>

<style>
.form-container {
    max-width: 500px;
    margin: 40px auto;
    padding: 30px;
    border-radius: 12px;
    background: #ffffff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

h1 {
    text-align: center;
    margin-bottom: 5px;
    color: #007BFF;
}
p {
    text-align: center;
    margin-bottom: 20px;
    color: #555;
}

.form-group {
    margin-bottom: 15px;
}
label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}
input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    transition: border-color 0.3s;
    resize: vertical;
}
input:focus,
textarea:focus {
    border-color: #007BFF;
    outline: none;
}

/* Botão */
.btn-submit {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    background-color: #28a745;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s;
}
.btn-submit:hover {
    background-color: #218838;
}

/* Alertas */
.alert {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
    font-weight: bold;
}
.alert.success {
    background-color: #d4edda;
    color: #155724;
}
.alert.error {
    background-color: #f8d7da;
    color: #721c24;
}
</style>
@endsection