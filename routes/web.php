<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('auth.register');
})->name('home');

// Rota de registro de usuário
Route::post('/register', [RegisterController::class, 'register'])->name('register');
