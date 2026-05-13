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
        $pesquisa = trim(mb_strtolower($request->input('pokemon', '')));
        $nome = $pesquisa ?: 'pikachu';

        $response = Http::withoutVerifying()
            ->acceptJson()
            ->timeout(5)
            ->get('https://pokeapi.co/api/v2/pokemon/' . rawurlencode($nome));

        if ($response->successful()) {
            $apiPokemon = $response->json();
        } elseif ($response->clientError()) {
            $local = Pokemon::whereRaw('LOWER(name) = ?', [$nome])->first();

            if (!$local) {
                abort(404, "Pokémon '{$nome}' não encontrado.");
            }

            $apiPokemon = [
                'id'       => $local->id,
                'name'     => $local->name,
                'height'   => null,
                'weight'   => null,
                'types'    => [],
                'sprites'  => ['front_default' => $local->image ? Storage::url($local->image) : null],
                'stats'    => [
                    ['stat' => ['name' => 'hp'],             'base_stat' => $local->hp],
                    ['stat' => ['name' => 'attack'],         'base_stat' => $local->attack],
                    ['stat' => ['name' => 'defense'],        'base_stat' => $local->defense],
                    ['stat' => ['name' => 'special-attack'], 'base_stat' => $local->special_attack],
                    ['stat' => ['name' => 'special-defense'],'base_stat' => $local->special_defense],
                    ['stat' => ['name' => 'speed'],          'base_stat' => $local->speed],
                ],
                'is_local' => true,
            ];
        } else {
            abort(502, 'Erro ao consultar a API externa.');
        }

        return view('pokemon', compact('apiPokemon'));
    }

    // public function create()
    // {
    //     return view('pokemon');
    // }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|unique:pokemons',
            'hp' => 'required|integer|min:1|max:255',
            'attack' => 'required|integer|min:1|max:255',
            'defense' => 'required|integer|min:1|max:255',
            'special_attack' => 'required|integer|min:1|max:255',
            'special_defense' => 'required|integer|min:1|max:255',
            'speed' => 'required|integer|min:1|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pokemons', 'public');
        }

        Pokemon::create($data);

        return redirect()->route('pokemon.local')->with('success', 'Pokémon criado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);

        $data = $request->validate([
            'name'            => 'required|string|max:50|unique:pokemons,name,' . $id,
            'hp'              => 'required|integer|min:1|max:255',
            'attack'          => 'required|integer|min:1|max:255',
            'defense'         => 'required|integer|min:1|max:255',
            'special_attack'  => 'required|integer|min:1|max:255',
            'special_defense' => 'required|integer|min:1|max:255',
            'speed'           => 'required|integer|min:1|max:255',
            'image'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($pokemon->image) {
                Storage::disk('public')->delete($pokemon->image);
            }
            $data['image'] = $request->file('image')->store('pokemons', 'public');
        } else {
            unset($data['image']);
        }

        $pokemon->update($data);

        return back()->with('success', 'Pokémon "' . ucfirst($pokemon->name) . '" atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $pokemon = Pokemon::findOrFail($id);

        if ($pokemon->image) {
            Storage::disk('public')->delete($pokemon->image);
        }

        $pokemon->delete();

        return back()->with('success', 'Pokémon excluído com sucesso!');
    }

    public function list(Request $request)
    {
        $nome = trim(mb_strtolower($request->input('pokemon', '')));
        $sort = $request->input('sort', '');
        $allowed = ['hp', 'attack', 'defense', 'special_attack', 'special_defense', 'speed'];

        $localPokemonsQuery = Pokemon::query();

        if (!empty($nome)) {
            $localPokemonsQuery->whereRaw('LOWER(name) like ?', ['%' . $nome . '%']);
        }

        if (in_array($sort, $allowed)) {
            $localPokemonsQuery->orderBy($sort, 'desc');
        }

        $pokemons = $localPokemonsQuery->get();

        return view('pokemon-list', compact('pokemons'));
    }
}


