<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'regular_price' => $this->faker->randomFloat(2, 10, 1000),  // Correção para regular_price
            'sale_price' => $this->faker->randomFloat(2, 5, 800),  // Correção para sale_price
            'quantity' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}

