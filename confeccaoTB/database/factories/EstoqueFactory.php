<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'produto' => fake()->word(),
            'quantidade' => fake()->numberBetween(0, 50),
            'preco_custo' => fake()->randomFloat(2, 5, 500),
            'preco_venda' => fake()->randomFloat(2, 10, 1000),
            'fornecedor' => fake()->company(),
        ];
    }
}