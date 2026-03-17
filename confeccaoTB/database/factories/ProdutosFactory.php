<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'nome' => fake()->sentence(3),
            'descricao' => fake()->sentence(5),
            'preco' => fake()->numberBetween(10, 1000),
            'estoque' => fake()->numberBetween(0, 500),
        ];
    }
}