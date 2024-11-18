<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class LoginTest extends TestCase
{

    use RefreshDatabase;

    // TESTANDO PAGINA QUE SÓ ADMIN PODE ACESSAR
    public function test_authenticated_user_session_is_persistent()
    {
        // Criar um usuário para o teste
        $user = User::factory()->create();

        // Fazer login com o usuário
        $this->actingAs($user);

        // Acessar a página que requer autenticação usando o nome da rota
        $response = $this->get(route('user.edit'));

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    // TENTANDO ACESSAR PAGINA ADMIN SEM SER ADMIN
    public function test_non_admin_user_cannot_access_dashboard()
    {
        // Crie um usuário não admin
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'utype' => 'USER',
        ]);

        // Simula o login do usuário
        $this->actingAs($user);

        // Tenta acessar a página administrativa
        $response = $this->get('/admin');

        // Verifica se o usuário foi redirecionado
        $response->assertRedirect('/login');
    }



}
