<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PokemonRouteTest extends TestCase
{
    public function test_pokemon_route_returns_data_from_external_api(): void
    {
        Http::fake([
            'https://pokeapi.co/api/v2/pokemon/pikachu' => Http::response([
                'id' => 25,
                'name' => 'pikachu',
                'sprites' => [
                    'front_default' => 'https://example.com/pikachu.png',
                ],
            ], 200),
        ]);

        $response = $this->get('/pokemon/pikachu');

        $response->assertStatus(200);
        $response->assertJsonPath('resultado.identificador', 25);
        $response->assertJsonPath('resultado.nome_do_pokemon', 'Pikachu');
        $response->assertJsonPath('resultado.foto', 'https://example.com/pikachu.png');
    }

    public function test_pokemon_route_returns_404_when_pokemon_is_not_found(): void
    {
        Http::fake([
            'https://pokeapi.co/api/v2/pokemon/invalidpoke' => Http::response([], 404),
        ]);

        $response = $this->get('/pokemon/invalidpoke');

        $response->assertStatus(404);
        $response->assertJson(['erro' => 'Pokémon não encontrado']);
    }

    public function test_pokemon_route_normalizes_uppercase_names(): void
    {
        Http::fake([
            'https://pokeapi.co/api/v2/pokemon/charizard' => Http::response([
                'id' => 6,
                'name' => 'charizard',
                'sprites' => [
                    'front_default' => 'https://example.com/charizard.png',
                ],
            ], 200),
        ]);

        $response = $this->get('/pokemon/CHARIZARD');

        $response->assertStatus(200);
        $response->assertJsonPath('resultado.identificador', 6);
    }

    public function test_pokemon_route_handles_names_with_hyphens(): void
    {
        Http::fake([
            'https://pokeapi.co/api/v2/pokemon/mr-mime' => Http::response([
                'id' => 122,
                'name' => 'mr-mime',
                'sprites' => [
                    'front_default' => 'https://example.com/mr-mime.png',
                ],
            ], 200),
        ]);

        $response = $this->get('/pokemon/mr-mime');

        $response->assertStatus(200);
        $response->assertJsonPath('resultado.identificador', 122);
    }

    public function test_pokemon_route_requires_name_parameter(): void
    {
        $response = $this->get('/pokemon/');

        $response->assertStatus(405);
    }
}
