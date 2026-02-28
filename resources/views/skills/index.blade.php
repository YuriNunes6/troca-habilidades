@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1>Habilidades Disponíveis</h1>
    <p>Escolha uma habilidade para aprender ou ensinar</p>

    <div class="skills-container">
        @foreach($skills as $skill)
            <div class="skill-card">
                <div class="skill-info">
                    <strong>{{ $skill->nome }}</strong>
                    <p>{{ $skill->descricao }}</p>
                </div>

                @auth
                    @if(auth()->user()->is_admin)
                        <div class="skill-actions">
                            <a href="{{ route('skills.edit', $skill->id) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar esta skill?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Deletar</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
</div>

<style>
.form-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #007BFF;
    margin-bottom: 5px;
}
p {
    text-align: center;
    color: #555;
    margin-bottom: 20px;
}

/* Grid de skills */
.skills-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

/* Card de skill */
.skill-card {
    background: #ffffff;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: all 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.skill-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
}

.skill-info strong {
    display: block;
    font-size: 1.1em;
    color: #007BFF;
    margin-bottom: 5px;
}

.skill-info p {
    color: #555;
    font-size: 0.9em;
}

/* Ações de admin */
.skill-actions {
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
}

.skill-actions a.btn-edit,
.skill-actions button.btn-delete {
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 0.85em;
    text-decoration: none;
    color: white;
    border: none;
    cursor: pointer;
    transition: background 0.3s;
}

.skill-actions a.btn-edit {
    background-color: #ffc107;
}
.skill-actions a.btn-edit:hover {
    background-color: #e0a800;
}

.skill-actions button.btn-delete {
    background-color: #dc3545;
}
.skill-actions button.btn-delete:hover {
    background-color: #c82333;
}
</style>
@endsection