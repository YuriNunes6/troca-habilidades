@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1>Editar Perfil</h1>
    <p>Atualize suas informações e habilidades que você pode ensinar</p>

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

    <form action="{{ route('users.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome completo</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Nova Senha <small>(deixe em branco para não alterar)</small></label>
            <input type="password" name="password" id="password" placeholder="Nova senha">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirme a senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repita a senha">
        </div>

        <h3>Habilidades que você pode ensinar</h3>
        <p>Marque ou desmarque suas habilidades:</p>
        <div class="skills-container">
            @foreach($skills as $skill)
                <label class="skill-card">
                    <input type="checkbox" name="skills[]" value="{{ $skill->id }}"
                        {{ (is_array(old('skills', $userSkills)) && in_array($skill->id, old('skills', $userSkills))) ? 'checked' : '' }}>
                    <div class="skill-info">
                        <strong>{{ $skill->nome }}</strong>
                        <span>{{ $skill->descricao }}</span>
                    </div>
                </label>
            @endforeach
        </div>

        <button type="submit" class="btn-submit">Atualizar Perfil</button>
    </form>
</div>

<style>
/* Mantendo o mesmo estilo do cadastro */
.form-container {
    max-width: 600px;
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
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    transition: border-color 0.3s;
}
input:focus {
    border-color: #007BFF;
    outline: none;
}

/* Skills */
.skills-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 10px;
    margin-bottom: 20px;
}

.skill-card {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    cursor: pointer;
    background-color: #f9f9f9;
    transition: all 0.2s;
}
.skill-card:hover {
    background-color: #e6f0ff;
    border-color: #007BFF;
}
.skill-card input[type="checkbox"] {
    margin-right: 10px;
    transform: scale(1.2);
}
.skill-info strong {
    display: block;
    color: #007BFF;
}
.skill-info span {
    font-size: 0.9em;
    color: #555;
}

/* Botão */
.btn-submit {
    width: 100%;
    padding: 12px;
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