<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;


class ProductTest extends TestCase
{
    use RefreshDatabase;

    //PRODUTO CRIADO
    public function test_product_can_be_created()
    {
        $admin = User::factory()->create(['utype' => 'ADM']);
        $category = Category::factory()->create();

        $productData = [
            'name' => 'Produto Teste',
            'slug' => 'produto-teste',
            'description' => 'Descrição do produto de teste.',
            'regular_price' => 100.00,
            'quantity' => 10,
            'category_id' => $category->id,
        ];

        $response = $this->actingAs($admin)->post('/admin/products/store', $productData);

        $response->assertRedirect('/admin/products');
        $response->assertSessionHas('status', 'Produto adicionado com sucesso!');
        $this->assertDatabaseHas('products', ['name' => 'Produto Teste']);
    }

    //VERIFICAR SE O PRODUTO ESTA SENDO DELETADO
    public function test_product_can_be_deleted()
    {
        $admin = User::factory()->create(['utype' => 'ADM']);
        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/products/delete/{$product->id}");

        $response->assertRedirect('/admin/products');
        $response->assertSessionHas('success', 'ITEM DELETADO COM SUCESSO');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}

