<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array {
    return [
        'nome' => fake()->sentence(3),
        'cpf' => fake()->name(),
        'telefone' => fake()->sentence(5),
        'reserva' => fake()->numberBetween(1,1000),
      
    ];
}
}
