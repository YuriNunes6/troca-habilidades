<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Rotas Públicas
Route::get('/', function () {
    return view('welcome');
});

// Login e Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cadastro de Usuários
Route::get('/cadastro', [AuthController::class, 'showCadastro'])->name('cadastro');
Route::post('/cadastro', [AuthController::class, 'cadastro'])->name('cadastro.submit');

// Rotas Protegidas - Usuários logados
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Usuários comuns
    Route::get('users', [UserController::class,'index'])->name('users.index');       // Lista de usuários
    Route::get('users/{user}', [UserController::class,'show'])->name('users.show');   // Perfil de outro usuário

    // Perfil do usuário logado
    Route::get('/meuPerfil', [UserController::class, 'profile'])->name('users.profile');
    Route::get('/mPerfil/editar', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/meuPerfil/editar', [UserController::class, 'update'])->name('users.update');

    // Requests
    Route::resource('requests', RequestController::class)->only([
        'index', 'create', 'store', 'show'
    ]);

    // Sessões
    Route::resource('sessions', SessionController::class)->only([
        'index', 'show'
    ]);

    // Avaliações
    Route::resource('avaliacoes', AvaliacaoController::class)->only([
        'create', 'store'
    ]);

    // Skills (apenas visualização para usuário)
    Route::get('skills', [SkillController::class,'index'])->name('skills.index');
    Route::get('skills/{skill}', [SkillController::class,'show'])->name('skills.show');

    // Cadastro de Admins - GET aberto para qualquer usuário logado
    Route::get('admins/create', [AdminController::class,'showCreate'])->name('admins.create');
});

// Rotas de Admin - POST e demais ações protegidas
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {

    // Gestão de Skills
    Route::get('skills/create',[SkillController::class,'create'])->name('skills.create');
    Route::post('skills',[SkillController::class,'store'])->name('skills.store');
    Route::get('skills/{skill}/edit',[SkillController::class,'edit'])->name('skills.edit');
    Route::put('skills/{skill}',[SkillController::class,'update'])->name('skills.update');
    Route::delete('skills/{skill}',[SkillController::class,'destroy'])->name('skills.destroy');

    // Cadastro de Admins - POST protegido
    Route::post('admins/create', [AdminController::class,'store'])->name('admins.store');

    // Admins existentes - CRUD protegido
    Route::get('admins', [AdminController::class,'index'])->name('admins.index');
    Route::get('admins/{admin}/edit', [AdminController::class,'edit'])->name('admins.edit');
    Route::put('admins/{admin}', [AdminController::class,'update'])->name('admins.update');
    Route::delete('admins/{admin}', [AdminController::class,'destroy'])->name('admins.destroy');
});