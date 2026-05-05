<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PokemonController;

/*
|--------------------------------------------------------------------------
| API de Exemplo Pokemon
|--------------------------------------------------------------------------
*/

// Rota raiz - redireciona para a Pokédex
Route::get('/', function () {
    return redirect('/pokedex');
});

// Rota da Pokédex
Route::get('/pokedex', [PokemonController::class, 'index']);

// Rota de teste simples
Route::get('/teste', function () {
    return 'Site funcionando!';
});

// Exemplo 1: GET - Buscando dados de uma API Externa (PokeAPI)
Route::get('/pokemon/{nome}', function ($nome) {
    $response = Http::withoutVerifying()->get("https://pokeapi.co/api/v2/pokemon/{$nome}");

    if ($response->successful()) {
        $dados = $response->json();
        return response()->json([
            'status' => 'Conectado com sucesso!',
            'resultado' => [
                'identificador' => $dados['id'],
                'nome_do_pokemon' => ucfirst($dados['name']),
                'foto' => $dados['sprites']['front_default']
            ]
        ], 200);
    }

    return response()->json(['erro' => 'Pokémon não encontrado'], 404);
});

// Exemplo 2: POST - Recebendo dados via JSON (Simulando Cadastro)
Route::post('/pokemon/novo', function (Request $request) {
    // Validação dos dados recebidos
    $dados = $request->validate([
        'nome'   => 'required|string|min:3',
        'tipo'   => 'required|string',
        'ataque' => 'required|integer'
    ]);

    // Simulação de salvamento no banco de dados
    return response()->json([
        'mensagem' => 'Pokémon cadastrado com sucesso!',
        'id_gerado' => rand(1000, 9999),
        'dados_recebidos' => $dados
    ], 201); // 201: Created
});

// Rotas para gerenciamento de Pokémon local
// Route::get('/pokemon/create', [PokemonController::class, 'create'])->name('pokemon.create');
Route::post('/pokemon', [PokemonController::class, 'store'])->name('pokemon.store');
Route::get('/pokemon-local', [PokemonController::class, 'list'])->name('pokemon.local');

