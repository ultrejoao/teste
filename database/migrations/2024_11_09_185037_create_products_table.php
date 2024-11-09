<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID do produto
            $table->string('name'); // Nome do produto
            $table->string('slug')->unique(); // Slug para URL amigável
            $table->text('description'); // Descrição do produto
            $table->decimal('regular_price', 8, 2); // Preço original
            $table->decimal('sale_price', 8, 2)->nullable(); // Preço promocional
            $table->integer('quantity')->default(0); // Quantidade disponível
            $table->string('image')->nullable(); // Imagem do produto
            $table->timestamps(); // Created_at e updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
