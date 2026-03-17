<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente' => fake()->name(),
            'produto' => fake()->word(),
            'quantidade' => fake()->numberBetween(1, 20),
            'valor' => fake()->randomFloat(2, 10, 5000),
        ];
    }
}