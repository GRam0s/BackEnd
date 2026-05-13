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

// Rotas para gerenciamento de Pokémon local (POST antes de GET com parâmetro)
Route::post('/pokemon', [PokemonController::class, 'store'])->name('pokemon.store');
Route::put('/pokemon/{id}', [PokemonController::class, 'update'])->name('pokemon.update');
Route::delete('/pokemon/{id}', [PokemonController::class, 'destroy'])->name('pokemon.destroy');
Route::get('/pokemon-local', [PokemonController::class, 'list'])->name('pokemon.local');

// Exemplo 1: GET - Buscando dados de uma API Externa (PokeAPI)
Route::get('/pokemon/{nome}', function ($nome) {
    $nome = trim(mb_strtolower($nome));

    if ($nome === '') {
        return response()->json(['erro' => 'Nome do Pokémon não pode estar vazio'], 400);
    }

    $response = Http::withoutVerifying()
        ->acceptJson()
        ->timeout(5)
        ->get('https://pokeapi.co/api/v2/pokemon/' . rawurlencode($nome));

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

    if ($response->clientError()) {
        return response()->json(['erro' => 'Pokémon não encontrado'], 404);
    }

    return response()->json(['erro' => 'Falha ao buscar o Pokémon'], 502);
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

