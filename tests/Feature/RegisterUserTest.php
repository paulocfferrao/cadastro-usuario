<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson(route('register'), [
            'name' => 'Usuário Teste',
            'email' => 'teste@example.com',
            'password' => 'senha123',
            'password_confirmation' => 'senha123',
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Usuário registrado com sucesso!',
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'teste@example.com',
        ]);
    }
}

