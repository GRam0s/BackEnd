<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index(Request $request)
    {
        $nome = $request->input('pokemon', 'pikachu');

        $response = Http::withoutVerifying()->get("https://pokeapi.co/api/v2/pokemon/{$nome}");

        if ($response->failed()) {
            abort(404, "Pokémon '{$nome}' não encontrado.");
        }

        $apiPokemon = $response->json();
        $localPokemons = Pokemon::all();

        return view('pokemon', compact('apiPokemon', 'localPokemons'));
    }

    // public function create()
    // {
    //     return view('pokemon');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:pokemons',
            'hp' => 'required|integer|min:1|max:255',
            'attack' => 'required|integer|min:1|max:255',
            'defense' => 'required|integer|min:1|max:255',
            'special_attack' => 'required|integer|min:1|max:255',
            'special_defense' => 'required|integer|min:1|max:255',
            'speed' => 'required|integer|min:1|max:255',
'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pokemons', 'public');
        }

        Pokemon::create($data);

        return redirect('/pokedex')->with('success', 'Pokémon criado com sucesso!');
    }

    public function list()
    {
        $pokemons = Pokemon::all();
        return view('pokemon-list', compact('pokemons'));
    }
}

