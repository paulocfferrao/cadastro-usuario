<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    // Exibe o formulário de cadastro e a lista de usuários
    public function showRegistrationForm()
    {
        $users = User::all(); // Busca todos os usuários
        return view('auth.register', compact('users'));
    }

    // Processa o cadastro de um novo usuário
    public function register(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:20|confirmed',
        ]);

        // Criação do usuário
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->route('register')->with('success', 'Usuário registrado com sucesso!');
    }

    // Exclui um usuário
    public function destroy(User $user)
    {
        $user->delete(); // Exclui o usuário
        return redirect()->route('register')->with('success', 'Usuário excluído com sucesso!');
    }
}