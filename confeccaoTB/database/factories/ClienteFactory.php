<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array 
{
    return [
        'nome'     => fake()->name(),
        'cpf'      => fake()->unique()->numerify('###########'), // Gera 11 números limpos
        'email'    => fake()->unique()->safeEmail(),
        'telefone' => fake()->phoneNumber(), // Formato (XX) 9XXXX-XXXX
        'endereco' => fake()->address(),
    ];
}

}
