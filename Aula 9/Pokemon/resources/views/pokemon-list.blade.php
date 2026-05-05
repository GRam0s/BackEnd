<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pokémon - Pokédex</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Reuse existing styles from pokemon.blade.php */
        body { margin: 0; min-height: 100vh; font-family: 'Inter', sans-serif; background: radial-gradient(circle at top, #99f6e4 0%, #4f46e5 35%, #0f172a 100%); color: #f8fafc; }
        .page-wrapper { max-width: 1200px; margin: 0 auto; padding: 32px 16px; }
        .card { background: rgba(15, 23, 42, 0.92); border: 2px solid #81e6d9; box-shadow: 0 18px 60px rgba(15, 23, 42, 0.45); border-radius: 24px; overflow: hidden; }
        .btn { padding: 12px 24px; border-radius: 18px; border: none; background: #38bdf8; color: #0f172a; font-weight: 800; cursor: pointer; transition: all 0.2s ease; box-shadow: 0 12px 32px rgba(56, 189, 248, 0.3); }
        .btn:hover { transform: translateY(-2px); background: #0ea5e9; box-shadow: 0 16px 40px rgba(56, 189, 248, 0.4); }
        .pokemon-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; padding: 32px; }
        .pokemon-card { background: rgba(30, 41, 59, 0.8); border: 2px solid rgba(129, 230, 217, 0.3); border-radius: 20px; overflow: hidden; transition: all 0.3s ease; }
        .pokemon-card:hover { transform: translateY(-8px); border-color: #81e6d9; box-shadow: 0 24px 64px rgba(129, 230, 217, 0.2); }
        .pokemon-img { height: 180px; background: linear-gradient(135deg, rgba(56, 189, 248, 0.2), rgba(129, 230, 217, 0.1)); display: flex; align-items: center; justify-content: center; }
        .pokemon-img img { max-height: 140px; max-width: 140px; object-fit: contain; image-rendering: pixelated; }
        .pokemon-info { padding: 20px; }
        .pokemon-name { font-size: 1.4rem; font-weight: 800; color: #e0f2fe; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.05em; }
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 12px; }
        .stat-item { background: rgba(56, 189, 248, 0.1); padding: 8px 12px; border-radius: 12px; text-align: center; font-size: 0.85rem; }
        .stat-label { color: #94a3b8; font-size: 0.75rem; }
        .stat-value { font-weight: 700; color: #38bdf8; }
        .empty-state { grid-column: 1 / -1; text-align: center; padding: 64px 32px; color: #64748b; }
        .back-btn { position: absolute; top: 32px; left: 32px; @apply btn text-sm px-6 py-2; }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <a href="/pokedex" class="back-btn">← Voltar à Pokédex</a>
        
        <div class="card">
            <div class="p-8 border-b border-slate-700/50">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-emerald-500/20 border-2 border-emerald-400 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-emerald-400 to-teal-500 bg-clip-text text-transparent">Meus Pokémon</h1>
                        <p class="text-slate-400 mt-1">Pokémon criados localmente ({{ $pokemons->count() }})</p>
                    </div>
                </div>
            </div>

            <div class="pokemon-grid">
                @forelse ($pokemons as $pokemon)
                    <div class="pokemon-card">
                        <div class="pokemon-img">
                            @if($pokemon->image)
                                <img src="{{ Storage::url($pokemon->image) }}" alt="{{ $pokemon->name }}" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                <div class="w-full h-full flex items-center justify-center text-slate-500 hidden">Sem imagem</div>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-500">Sem imagem</div>
                            @endif
                        </div>
                        <div class="pokemon-info">
                            <h3 class="pokemon-name">#{{ $pokemon->id }} {{ ucfirst($pokemon->name) }}</h3>
                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-label">HP</div>
                                    <div class="stat-value">{{ $pokemon->hp }}</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-label">ATK</div>
                                    <div class="stat-value">{{ $pokemon->attack }}</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-label">DEF</div>
                                    <div class="stat-value">{{ $pokemon->defense }}</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-label">SP.ATK</div>
                                    <div class="stat-value">{{ $pokemon->special_attack }}</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-label">SP.DEF</div>
                                    <div class="stat-value">{{ $pokemon->special_defense }}</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-label">SPD</div>
                                    <div class="stat-value">{{ $pokemon->speed }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="w-24 h-24 mx-auto mb-8 bg-slate-800/50 rounded-3xl flex items-center justify-center">
                            <svg class="w-12 h-12 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-300 mb-4">Nenhum Pokémon criado</h3>
                        <p class="text-slate-400 mb-8 max-w-md mx-auto">Crie seu primeiro Pokémon personalizado usando o botão na Pokédex!</p>
                        <a href="/pokedex" class="btn">← Voltar à Pokédex</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>

