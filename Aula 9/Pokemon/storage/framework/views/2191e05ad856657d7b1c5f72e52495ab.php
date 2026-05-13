<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex - <?php echo e(ucfirst(request('pokemon', 'pikachu'))); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        /* ── Interações ──────────────────────────── */
        .action-btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 18px; border-radius: 999px;
            font-weight: 700; font-size: 0.85rem;
            cursor: pointer; transition: all 0.2s ease;
            border: 2px solid transparent;
        }
        .fav-btn { border-color: rgba(239,68,68,0.3); background: rgba(239,68,68,0.08); color: #fca5a5; }
        .fav-btn:hover { border-color: rgba(239,68,68,0.6); background: rgba(239,68,68,0.18); }
        .fav-btn.active { border-color: #ef4444; background: rgba(239,68,68,0.2); color: #ef4444; }
        .cry-btn { border-color: rgba(56,189,248,0.3); background: rgba(56,189,248,0.08); color: #7dd3fc; }
        .cry-btn:hover { border-color: rgba(56,189,248,0.6); background: rgba(56,189,248,0.18); }
        .cry-btn.playing { border-color: #38bdf8; color: #38bdf8; animation: pulse 0.8s infinite; }
        .random-btn {
            padding: 18px 22px; border-radius: 18px; border: none;
            background: linear-gradient(135deg, #818cf8, #a78bfa);
            color: #fff; font-weight: 800; cursor: pointer;
            transition: all 0.16s ease; box-shadow: 0 12px 32px rgba(129,140,248,0.25);
        }
        .random-btn:hover { transform: translateY(-1px); box-shadow: 0 18px 45px rgba(129,140,248,0.35); }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.6} }
        @keyframes growBar { from { width: 0 !important; } }
        .bar-fill { animation: growBar 1.2s ease-out; }
        @media (max-width: 720px) {
            .card-header { grid-template-columns: 1fr; }
            .search-bar { flex-direction: column; }
        }
    </style>
</head>
<body>
<div class="page-wrapper">
        <div class="card">
        <div class="flex justify-end gap-3 p-6">
                <a
                    href="<?php echo e(route('pokemon.local')); ?>"
                    class="px-8 py-4 bg-slate-700/80 border-2 border-slate-500/50 text-slate-200 font-bold text-lg rounded-xl hover:border-cyan-400 hover:bg-slate-700 transform hover:-translate-y-1 transition-all duration-200 shadow-xl flex items-center gap-3"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Seus Pokémons
                </a>
            </div>

        <div class="search-bar top-search-bar">
            <form method="GET" action="<?php echo e(url('/pokedex')); ?>" class="search-form">
                <input
                    type="text"
                    name="pokemon"
                    value="<?php echo e(request('pokemon')); ?>"
                    placeholder="Buscar Pokémon (ex: pikachu)"
                    autocomplete="off"
                />
                <button type="submit">
                    BUSCAR
                </button>
                <button type="button" class="random-btn" onclick="loadRandom()" title="Pokémon aleatório">
                    🎲 ALEATÓRIO
                </button>
            </form>
        </div>

        <div class="card-header">
            <div>
                <div class="badge">POKÉMON</div>
                <h1 class="pokemon-title"><?php echo e(ucfirst($apiPokemon['name'] ?? '')); ?></h1>
                <div class="pokemon-meta">
                    <span>Nº <?php echo e(isset($apiPokemon['id']) ? str_pad($apiPokemon['id'], 3, '0', STR_PAD_LEFT) : '-'); ?></span>
                    <span>ALT <?php echo e(isset($apiPokemon['height']) ? number_format($apiPokemon['height'] / 10, 1, ',', '') : '-'); ?>m</span>
                    <span>PES <?php echo e(isset($apiPokemon['weight']) ? number_format($apiPokemon['weight'] / 10, 1, ',', '') : '-'); ?>kg</span>
                </div>
                <div class="mt-4">
    <?php if(isset($apiPokemon['types'])): ?>
        <?php $__currentLoopData = $apiPokemon['types']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="type-chip"><?php echo e(strtoupper($tipo['type']['name'])); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
                </div>

                <div class="flex flex-wrap gap-3 mt-5">
                    <button id="fav-btn" class="action-btn fav-btn" onclick="toggleFavorite()">
                        <svg id="heart-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span id="fav-label">Favoritar</span>
                    </button>
                    <?php if(empty($apiPokemon['is_local'])): ?>
                    <button id="cry-btn" class="action-btn cry-btn" onclick="playCry()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072M12 6v12M8.464 15.536a5 5 0 010-7.072"/>
                        </svg>
                        Ouvir Grito
                    </button>
                    <?php endif; ?>
                </div>
            </div>

            <div class="pokemon-image">
                <img src="<?php echo e($apiPokemon['sprites']['front_default'] ?? ''); ?>" alt="<?php echo e($apiPokemon['name'] ?? ''); ?>">
            </div>
        </div>

        <div class="details-grid">
            <div class="detail-card">
                <h3>Região</h3>
                <?php if(!empty($apiPokemon['is_local'])): ?>
                    <p>PERSONALIZADO</p>
                <?php else: ?>
                    <p><?php echo e(strtoupper(
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
                    )); ?></p>
                <?php endif; ?>
            </div>
            <div class="detail-card">
                <h3>Altura e Peso</h3>
                <?php if(!empty($apiPokemon['is_local'])): ?>
                    <p>-</p>
                <?php else: ?>
                    <?php echo e(number_format($apiPokemon['height'] / 10, 1, ',', '')); ?>m / <?php echo e(number_format($apiPokemon['weight'] / 10, 1, ',', '')); ?>kg
                <?php endif; ?>
            </div>
        </div>

    <div class="details-grid" style="grid-template-columns: 1fr; padding-top: 0;">
            <div class="detail-card">
                <h3>Status</h3>
                <?php
                    $traducaoStats = [
                        'hp'               => 'VIDA',
                        'attack'           => 'ATAQUE',
                        'defense'          => 'DEFESA',
                        'special-attack'   => 'ATQ. ESP',
                        'special-defense'  => 'DEF. ESP',
                        'speed'            => 'VELOCIDADE',
                    ];
                ?>
                <?php $__currentLoopData = $apiPokemon['stats']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $nome = $stat['stat']['name'];
                        $valor = $stat['base_stat'];
                        $porcentagem = min(100, ($valor / 120) * 100);
                    ?>
                    <div class="stat-row">
                        <div class="stat-title">
                            <span><?php echo e($traducaoStats[$nome] ?? strtoupper($nome)); ?></span>
                            <span><?php echo e($valor); ?></span>
                        </div>
                        <div class="bar-track">
                            <div class="bar-fill" style="width: <?php echo e($porcentagem); ?>%;"></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>

    <div class=”footer”>
        Busque qualquer Pokémon por nome e veja seus stats em tempo real.
    </div>

</div>
<script>
// ── Aleatório ───────────────────────────────────────────
function loadRandom() {
    window.location = '/pokedex?pokemon=' + Math.ceil(Math.random() * 1010);
}

// ── Favoritos ───────────────────────────────────────────
const POKEMON_NAME = '<?php echo e(addslashes($apiPokemon["name"] ?? "")); ?>';
const FAV_KEY = 'pokemon_favorites';
function getFavs() { return JSON.parse(localStorage.getItem(FAV_KEY) || '[]'); }
function toggleFavorite() {
    const favs = getFavs();
    const idx = favs.indexOf(POKEMON_NAME);
    if (idx === -1) favs.push(POKEMON_NAME); else favs.splice(idx, 1);
    localStorage.setItem(FAV_KEY, JSON.stringify(favs));
    updateFavBtn();
}
function updateFavBtn() {
    const isFav = getFavs().includes(POKEMON_NAME);
    const btn = document.getElementById('fav-btn');
    if (!btn) return;
    btn.classList.toggle('active', isFav);
    document.getElementById('heart-icon').setAttribute('fill', isFav ? 'currentColor' : 'none');
    document.getElementById('fav-label').textContent = isFav ? 'Favoritado ♥' : 'Favoritar';
}
updateFavBtn();

// ── Grito do Pokémon ────────────────────────────────────
<?php if(empty($apiPokemon['is_local'])): ?>
const CRY_ID = <?php echo e($apiPokemon['id'] ?? 0); ?>;
let cryAudio = null;
function playCry() {
    const btn = document.getElementById('cry-btn');
    if (cryAudio && !cryAudio.paused) {
        cryAudio.pause(); cryAudio.currentTime = 0;
        btn.classList.remove('playing'); return;
    }
    cryAudio = new Audio('https://raw.githubusercontent.com/PokeAPI/cries/main/cries/pokemon/latest/' + CRY_ID + '.ogg');
    btn.classList.add('playing');
    cryAudio.play().catch(() => btn.classList.remove('playing'));
    cryAudio.onended = () => btn.classList.remove('playing');
}
<?php endif; ?>

// ── Cores dos tipos ─────────────────────────────────────
const typeColors = {
    normal:'#A8A878', fire:'#F08030', water:'#6890F0', electric:'#F8D030',
    grass:'#78C850', ice:'#98D8D8', fighting:'#C03028', poison:'#A040A0',
    ground:'#E0C068', flying:'#A890F0', psychic:'#F85888', bug:'#A8B820',
    rock:'#B8A038', ghost:'#705898', dragon:'#7038F8', dark:'#705848',
    steel:'#B8B8D0', fairy:'#EE99AC'
};
document.querySelectorAll('.type-chip').forEach(chip => {
    const type = chip.textContent.trim().toLowerCase();
    const c = typeColors[type];
    if (c) { chip.style.background = c + '33'; chip.style.borderColor = c + 'aa'; chip.style.color = c; }
});
</script>
</body>
</html>
<?php /**PATH C:\laragon\www\Ramos\BackEnd\Aula 9\Pokemon\resources\views/pokemon.blade.php ENDPATH**/ ?>