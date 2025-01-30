<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [RegisterController::class, 'showRegistrationForm'])->name('home');

// Rota de registro de usuário
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Rota para exibir o formulário de cadastro e a lista de usuários
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Rota para excluir um usuário
Route::delete('/users/{user}', [RegisterController::class, 'destroy'])->name('users.destroy');