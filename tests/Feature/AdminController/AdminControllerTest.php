<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;


class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_view_can_be_accessed()
    {
        // Cria um usuário administrador
        $admin = User::factory()->create([
            'utype' => 'ADM',
        ]);

        // Faz login como administrador
        $response = $this->actingAs($admin)->get('/admin');

        // Verifica se a view foi carregada corretamente
        $response->assertStatus(200);
        $response->assertViewIs('admin.index');
    }


}


