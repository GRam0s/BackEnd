<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex - {{ ucfirst(request('pokemon', 'pikachu')) }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('modal', {
                open: false
            })
        })
    </script>

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top, #99f6e4 0%, #4f46e5 35%, #0f172a 100%);
            color: #f8fafc;
        }
        .page-wrapper {
            max-width: 900px;
            margin: 0 auto;
            padding: 32px 16px;
        }
        .card {
            background: rgba(15, 23, 42, 0.92);
            border: 2px solid #81e6d9;
            box-shadow: 0 18px 60px rgba(15, 23, 42, 0.45);
            border-radius: 24px;
            overflow: hidden;
        }
        .card-header {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 20px;
            padding: 24px;
            align-items: center;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 12px;
            border-radius: 999px;
            border: 2px solid #7dd3fc;
            background: rgba(56, 189, 248, 0.12);
            color: #bae6fd;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
        }
        .pokemon-image {
            background: radial-gradient(circle at center, rgba(56, 189, 248, 0.18), transparent 65%);
            border-radius: 24px;
            padding: 22px;
            text-align: center;
        }
        .pokemon-image img {
            width: 100%;
            max-width: 260px;
            height: auto;
            image-rendering: pixelated;
        }
        .pokemon-title {
            text-transform: uppercase;
            font-size: 2.25rem;
            margin: 0 0 8px;
            letter-spacing: 0.08em;
        }
        .pokemon-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 0.85rem;
            color: #cbd5e1;
        }
        .pokemon-meta span {
            padding: 8px 12px;
            border: 1px solid rgba(148, 163, 184, 0.16);
            border-radius: 999px;
            background: rgba(148, 163, 184, 0.06);
        }
        .top-search-bar {
            display: flex;
            justify-content: center;
            padding: 24px 24px 0;
        }
        .search-bar {
            width: 100%;
        }
        .search-form {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            width: 100%;
            max-width: 780px;
            background: rgba(255, 255, 255, 0.08);
            padding: 16px;
            border-radius: 24px;
            border: 1px solid rgba(56, 189, 248, 0.28);
            backdrop-filter: blur(12px);
            box-shadow: 0 24px 80px rgba(15, 23, 42, 0.12);
        }
        .search-form input {
            flex: 1 1 280px;
            min-width: 240px;
            padding: 18px 20px;
            border-radius: 18px;
            border: 1px solid rgba(148, 163, 184, 0.24);
            background: rgba(15, 23, 42, 0.95);
            color: #f8fafc;
            outline: none;
            font-size: 1rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .search-form input:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.12);
        }
        .search-form button {
            padding: 18px 28px;
            border-radius: 18px;
            border: none;
            background: #38bdf8;
            color: #0f172a;
            font-weight: 800;
            cursor: pointer;
            transition: transform 0.16s ease, background 0.16s ease, box-shadow 0.16s ease;
            min-width: 150px;
            box-shadow: 0 16px 40px rgba(56, 189, 248, 0.24);
        }
        .search-form button:hover {
            transform: translateY(-1px);
            background: #0ea5e9;
            box-shadow: 0 18px 45px rgba(56, 189, 248, 0.28);
        }
        .search-bar button:hover {
            transform: translateY(-1px);
            background: #0ea5e9;
        }
        .bar-track {
            width: 100%;
            height: 20px;
            border-radius: 999px;
            background: rgba(148, 163, 184, 0.12);
            overflow: hidden;
        }
        .type-chip {
            display: inline-flex;
            align-items: center;
            padding: 7px 12px;
            margin-right: 8px;
            margin-bottom: 8px;
            border-radius: 999px;
            border: 1px solid rgba(56, 189, 248, 0.24);
            background: rgba(14, 165, 233, 0.14);
            color: #e0f2fe;
            font-size: 0.85rem;
            font-weight: 700;
        }
        .stat-row {
            margin-bottom: 18px;
        }
        .stat-title {
            display: flex;
            justify-content: space-between;
            font-size: 0.87rem;
            margin-bottom: 6px;
            color: #cbd5e1;
        }
        .bar-fill {
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            transition: width 0.4s ease;
        }
        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            padding: 0 24px 24px;
        }
        .detail-card {
            padding: 18px;
            border-radius: 18px;
            border: 1px solid rgba(148, 163, 184, 0.14);
            background: rgba(15, 23, 42, 0.82);
        }
        .detail-card h3 {
            margin: 0 0 8px;
            font-size: 0.92rem;
            color: #bfdbfe;
        }
        .detail-card p {
            margin: 0;
            color: #e2e8f0;
            font-size: 0.96rem;
            line-height: 1.55;
        }
        .footer {
            text-align: center;
            padding: 24px;
            color: rgba(226, 232, 240, 0.68);
            font-size: 0.85rem;
        }
        @media (max-width: 720px) {
            .card-header { grid-template-columns: 1fr; }
            .search-bar { flex-direction: column; }
        }
    </style>
</head>
<body>
<div class="page-wrapper">
        <div class="card">
        @if (session('success'))
            <div class="mx-6 mb-6 p-4 rounded-2xl bg-emerald-500/10 border-2 border-emerald-400/30 backdrop-blur-sm animate-in slide-in-from-top-4 duration-300">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-emerald-400/20 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-emerald-300 mb-1">{{ session('success') }}</h3>
                        <p class="text-emerald-200 text-sm">Seu Pokémon foi adicionado à lista abaixo!</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="flex justify-end p-6">
                <button 
x-on:click="$store.modal.open = true"
                    class="px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-600 text-slate-900 font-bold text-lg rounded-xl hover:from-emerald-600 hover:to-teal-700 transform hover:-translate-y-1 transition-all duration-200 shadow-xl flex items-center gap-3"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Cadastrar Novo Pokémon
                </button>
            </div>

        <div class="search-bar top-search-bar">
            <form method="GET" action="{{ url('/pokedex') }}" class="search-form">
                <input
                    type="text"
                    name="pokemon"
                    value="{{ request('pokemon') }}"
                    placeholder="Buscar Pokémon (ex: pikachu)"
                    autocomplete="off"
                />
                <button type="submit">
                    BUSCAR
                </button>
            </form>
        </div>

        <div class="card-header">
            <div>
                <div class="badge">POKÉMON</div>
                <h1 class="pokemon-title">{{ ucfirst($apiPokemon['name']) }}</h1>
                <div class="pokemon-meta">
                    <span>Nº {{ str_pad($apiPokemon['id'], 3, '0', STR_PAD_LEFT) }}</span>
                    <span>ALT {{ number_format($apiPokemon['height'] / 10, 1, ',', '') }}m</span>
                    <span>PES {{ number_format($apiPokemon['weight'] / 10, 1, ',', '') }}kg</span>
                </div>
                <div class="mt-4">
    @foreach ($apiPokemon['types'] as $tipo)
                        <span class="type-chip">{{ strtoupper($tipo['type']['name']) }}</span>
                    @endforeach
                </div>
            </div>

            <div class="pokemon-image">
                <img src="{{ $apiPokemon['sprites']['front_default'] }}" alt="{{ $apiPokemon['name'] }}">
            </div>
        </div>

        <div class="details-grid">
            <div class="detail-card">
                <h3>Região</h3>
                <p>{{ strtoupper(
                    match(true) {
                        $apiPokemon['id'] <= 151 => 'Kanto',
                        $apiPokemon['id'] <= 251 => 'Johto',
                        $apiPokemon['id'] <= 386 => 'Hoenn',
                        $apiPokemon['id'] <= 493 => 'Sinnoh',
                        $apiPokemon['id'] <= 649 => 'Unova',
                        $apiPokemon['id'] <= 721 => 'Kalos',
                        $apiPokemon['id'] <= 809 => 'Alola',
                        $apiPokemon['id'] <= 905 => 'Galar',
                        default => 'Paldea'
                    }
                ) }}</p>
            </div>
            <div class="detail-card">
                <h3>Altura e Peso</h3>
{{ number_format($apiPokemon['height'] / 10, 1, ',', '') }}m / {{ number_format($apiPokemon['weight'] / 10, 1, ',', '') }}kg
            </div>
        </div>

    <div class="details-grid" style="grid-template-columns: 1fr; padding-top: 0;">
            <div class="detail-card">
                <h3>Status</h3>
                @php
                    $traducaoStats = [
                        'hp'               => 'VIDA',
                        'attack'           => 'ATAQUE',
                        'defense'          => 'DEFESA',
                        'special-attack'   => 'ATQ. ESP',
                        'special-defense'  => 'DEF. ESP',
                        'speed'            => 'VELOCIDADE',
                    ];
                @endphp
                @foreach ($apiPokemon['stats'] as $stat)
                    @php
                        $nome = $stat['stat']['name'];
                        $valor = $stat['base_stat'];
                        $porcentagem = min(100, ($valor / 120) * 100);
                    @endphp
                    <div class="stat-row">
                        <div class="stat-title">
                            <span>{{ $traducaoStats[$nome] ?? strtoupper($nome) }}</span>
                            <span>{{ $valor }}</span>
                        </div>
                        <div class="bar-track">
                            <div class="bar-fill" style="width: {{ $porcentagem }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @if($localPokemons->isNotEmpty())
        <div class="border-t border-slate-700/50 pt-8">
            <div class="px-6 pb-6">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-emerald-400 to-teal-500 bg-clip-text text-transparent mb-2">Meus Pokémon Locais ({{ $localPokemons->count() }})</h2>
                <p class="text-slate-400">Pokémon personalizados salvos no banco de dados</p>
            </div>
            <div class="pokemon-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; padding: 0 24px 32px;">
                @foreach($localPokemons as $p)
                <div class="pokemon-card" style="background: rgba(30, 41, 59, 0.8); border: 2px solid rgba(129, 230, 217, 0.5); border-radius: 20px; overflow: hidden; transition: all 0.3s ease;">
                    <div class="pokemon-img" style="height: 160px; background: linear-gradient(135deg, rgba(56, 189, 248, 0.15), rgba(129, 230, 217, 0.1)); display: flex; align-items: center; justify-content: center;">
                        @if($p->image)
                        <img src="{{ Storage::url($p->image) }}" alt="{{ $p->name }}" style="max-height: 120px; max-width: 120px; object-fit: cover; border-radius: 12px;" onerror="this.style.display='none'; this.parentNode.innerHTML='<div style=\"color: #64748b; font-size: 48px;\">?</div>'">
                        @else
                        <div style="color: #64748b; font-size: 48px; font-weight: bold;">?</div>
                        @endif
                    </div>
                    <div class="pokemon-info" style="padding: 20px;">
                        <h3 style="font-size: 1.2rem; font-weight: 800; color: #e0f2fe; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.03em;">{{ $p->name }}</h3>
                        <div class="stats-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 12px;">
                            <div style="background: rgba(56, 189, 248, 0.1); padding: 8px 12px; border-radius: 12px; text-align: center; font-size: 0.85rem;">
                                <div style="color: #94a3b8; font-size: 0.75rem;">HP</div>
                                <div style="font-weight: 700; color: #38bdf8;">{{ $p->hp }}</div>
                            </div>
                            <div style="background: rgba(56, 189, 248, 0.1); padding: 8px 12px; border-radius: 12px; text-align: center; font-size: 0.85rem;">
                                <div style="color: #94a3b8; font-size: 0.75rem;">ATK</div>
                                <div style="font-weight: 700; color: #38bdf8;">{{ $p->attack }}</div>
                            </div>
                            <div style="background: rgba(56, 189, 248, 0.1); padding: 8px 12px; border-radius: 12px; text-align: center; font-size: 0.85rem;">
                                <div style="color: #94a3b8; font-size: 0.75rem;">DEF</div>
                                <div style="font-weight: 700; color: #38bdf8;">{{ $p->defense }}</div>
                            </div>
                            <div style="background: rgba(56, 189, 248, 0.1); padding: 8px 12px; border-radius: 12px; text-align: center; font-size: 0.85rem;">
                                <div style="color: #94a3b8; font-size: 0.75rem;">SPATK</div>
                                <div style="font-weight: 700; color: #38bdf8;">{{ $p->special_attack }}</div>
                            </div>
                            <div style="background: rgba(56, 189, 248, 0.1); padding: 8px 12px; border-radius: 12px; text-align: center; font-size: 0.85rem;">
                                <div style="color: #94a3b8; font-size: 0.75rem;">SPDEF</div>
                                <div style="font-weight: 700; color: #38bdf8;">{{ $p->special_defense }}</div>
                            </div>
                            <div style="background: rgba(56, 189, 248, 0.1); padding: 8px 12px; border-radius: 12px; text-align: center; font-size: 0.85rem;">
                                <div style="color: #94a3b8; font-size: 0.75rem;">SPD</div>
                                <div style="font-weight: 700; color: #38bdf8;">{{ $p->speed }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    @include('components.pokemon-form')
    
    <div class="footer">
        Busque qualquer Pokémon por nome e veja seus stats em tempo real.
    </div>

</div>
</body>
</html>
