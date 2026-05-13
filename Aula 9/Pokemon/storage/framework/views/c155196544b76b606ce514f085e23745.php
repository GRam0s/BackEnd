<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pokémon</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('modal', { open: false });
            Alpine.store('editModal', {
                visible: false,
                id: null, name: '', hp: 1, attack: 1, defense: 1,
                special_attack: 1, special_defense: 1, speed: 1,
                show(d) { Object.assign(this, d, { visible: true }); },
                close() { this.visible = false; }
            });
        });
    </script>
    <style>
        [x-cloak] { display: none !important; }
        *, *::before, *::after { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; font-family: 'Inter', system-ui, sans-serif; background: radial-gradient(ellipse at top left, #0d9488 0%, #4338ca 45%, #0f172a 100%); color: #f8fafc; }

        /* ── Layout ───────────────────────────── */
        .page-wrapper { max-width: 1300px; margin: 0 auto; padding: 28px 20px 80px; }
        .top-nav { display: flex; align-items: center; justify-content: space-between; margin-bottom: 32px; flex-wrap: wrap; gap: 12px; }
        .back-link { display: inline-flex; align-items: center; gap: 8px; padding: 11px 22px; border-radius: 14px; background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.13); color: #cbd5e1; font-weight: 700; text-decoration: none; font-size: 0.9rem; transition: all 0.2s; backdrop-filter: blur(10px); }
        .back-link:hover { background: rgba(255,255,255,0.14); color: #f8fafc; transform: translateY(-1px); }

        /* ── Header ───────────────────────────── */
        .header-section { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px; }
        .page-title { font-size: 2.2rem; font-weight: 900; background: linear-gradient(135deg, #34d399, #38bdf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin: 0; line-height: 1.1; }
        .page-subtitle { color: #64748b; font-size: 0.9rem; margin-top: 4px; }
        .btn-add { display: inline-flex; align-items: center; gap: 10px; padding: 14px 28px; border-radius: 16px; border: none; background: linear-gradient(135deg, #10b981, #0d9488); color: #fff; font-weight: 800; font-size: 1rem; cursor: pointer; transition: all 0.2s; box-shadow: 0 8px 24px rgba(16,185,129,0.3); }
        .btn-add:hover { transform: translateY(-2px); box-shadow: 0 14px 32px rgba(16,185,129,0.4); }

        /* ── Flash ────────────────────────────── */
        .flash { display: flex; align-items: center; gap: 12px; padding: 14px 20px; border-radius: 16px; background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.3); color: #6ee7b7; margin-bottom: 20px; font-weight: 600; }

        /* ── Controls ─────────────────────────── */
        .controls-bar { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; margin-bottom: 24px; }
        .ctrl-input { flex: 1; min-width: 200px; padding: 13px 18px; border-radius: 14px; border: 1px solid rgba(100,116,139,0.25); background: rgba(15,23,42,0.6); color: #f8fafc; font-size: 0.95rem; outline: none; transition: border-color 0.2s; backdrop-filter: blur(8px); }
        .ctrl-input:focus { border-color: #38bdf8; box-shadow: 0 0 0 3px rgba(56,189,248,0.1); }
        .ctrl-input::placeholder { color: #475569; }
        .ctrl-select { padding: 13px 16px; border-radius: 14px; border: 1px solid rgba(100,116,139,0.25); background: rgba(15,23,42,0.6); color: #94a3b8; font-weight: 600; outline: none; cursor: pointer; backdrop-filter: blur(8px); }
        .ctrl-btn { padding: 13px 24px; border-radius: 14px; border: none; background: #0ea5e9; color: #fff; font-weight: 800; cursor: pointer; transition: all 0.18s; white-space: nowrap; }
        .ctrl-btn:hover { background: #38bdf8; transform: translateY(-1px); }

        /* ── Summary ──────────────────────────── */
        .summary-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 28px; }
        .summary-card { background: rgba(15,23,42,0.7); border: 1px solid rgba(255,255,255,0.06); border-radius: 18px; padding: 20px 16px; text-align: center; backdrop-filter: blur(12px); }
        .summary-val { font-size: 2.4rem; font-weight: 900; line-height: 1; }
        .summary-label { font-size: 0.7rem; color: #475569; text-transform: uppercase; letter-spacing: 0.1em; margin-top: 6px; }

        /* ── Pokemon Grid ─────────────────────── */
        .poke-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }

        /* ── Pokemon Card ─────────────────────── */
        .poke-card { background: rgba(15,23,42,0.82); border: 1px solid rgba(255,255,255,0.07); border-radius: 22px; overflow: hidden; display: flex; flex-direction: column; transition: transform 0.25s, box-shadow 0.25s; border-top: 4px solid var(--accent, #38bdf8); position: relative; }
        .poke-card:hover { transform: translateY(-6px); box-shadow: 0 24px 60px rgba(0,0,0,0.5), 0 0 0 1px var(--accent, #38bdf8); }

        /* Card image */
        .poke-img-area { height: 190px; display: flex; align-items: center; justify-content: center; position: relative; background: radial-gradient(ellipse at center, color-mix(in srgb, var(--accent, #38bdf8) 18%, transparent) 0%, transparent 70%); }
        .poke-img-area img { max-height: 155px; max-width: 155px; object-fit: contain; image-rendering: pixelated; filter: drop-shadow(0 6px 18px rgba(0,0,0,0.45)); transition: transform 0.3s; }
        .poke-card:hover .poke-img-area img { transform: scale(1.1) translateY(-5px); }
        .no-img-placeholder { font-size: 4rem; opacity: 0.18; user-select: none; }
        .total-badge { position: absolute; top: 10px; right: 12px; padding: 3px 10px; border-radius: 999px; background: rgba(0,0,0,0.55); border: 1px solid rgba(255,255,255,0.1); font-size: 0.72rem; font-weight: 800; color: #e2e8f0; }
        .fav-btn-card { position: absolute; top: 8px; left: 10px; background: none; border: none; cursor: pointer; font-size: 1.35rem; color: #334155; transition: color 0.2s, transform 0.2s; line-height: 1; padding: 4px; }
        .fav-btn-card:hover { transform: scale(1.35); color: #ef4444; }

        /* Card body */
        .poke-body { padding: 16px 20px 20px; flex: 1; display: flex; flex-direction: column; }
        .poke-header-row { display: flex; align-items: baseline; gap: 8px; margin-bottom: 16px; }
        .poke-name { font-size: 1.25rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em; color: #f1f5f9; }
        .poke-num { font-size: 0.78rem; font-weight: 700; color: #334155; }

        /* Stat bars */
        .stat-bars { display: flex; flex-direction: column; gap: 8px; margin-bottom: 18px; }
        .stat-bar-row { display: grid; grid-template-columns: 38px 1fr 28px; align-items: center; gap: 8px; }
        .sbl { font-size: 0.68rem; font-weight: 800; color: #475569; text-transform: uppercase; }
        .sbt { height: 8px; background: rgba(148,163,184,0.1); border-radius: 999px; overflow: hidden; }
        .sbf { height: 100%; border-radius: 999px; background: var(--accent, #38bdf8); transition: width 0.7s cubic-bezier(.4,0,.2,1); opacity: 0.85; }
        .sbv { font-size: 0.75rem; font-weight: 700; color: #64748b; text-align: right; }

        /* Action buttons */
        .card-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: auto; }
        .action-edit { padding: 11px 8px; border-radius: 12px; border: 1px solid rgba(56,189,248,0.25); background: rgba(56,189,248,0.07); color: #7dd3fc; font-weight: 700; font-size: 0.82rem; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 6px; }
        .action-edit:hover { background: rgba(56,189,248,0.18); border-color: #38bdf8; transform: translateY(-1px); }
        .action-del { padding: 11px 8px; border-radius: 12px; border: 1px solid rgba(239,68,68,0.25); background: rgba(239,68,68,0.07); color: #fca5a5; font-weight: 700; font-size: 0.82rem; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 6px; width: 100%; }
        .action-del:hover { background: rgba(239,68,68,0.18); border-color: #ef4444; transform: translateY(-1px); }

        /* ── Empty State ──────────────────────── */
        .empty-state { grid-column: 1 / -1; text-align: center; padding: 80px 32px; color: #334155; }

        /* ── Modal ────────────────────────────── */
        .modal-bg { position: fixed; inset: 0; z-index: 50; background: rgba(0,0,0,0.7); backdrop-filter: blur(4px); display: flex; align-items: center; justify-content: center; padding: 20px; overflow-y: auto; }
        .modal-box { background: rgba(10,15,30,0.97); border: 2px solid rgba(56,189,248,0.35); border-radius: 24px; padding: 36px; width: 100%; max-width: 650px; }
        .modal-title { font-size: 1.6rem; font-weight: 900; background: linear-gradient(135deg, #38bdf8, #818cf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin: 0 0 28px; }
        .modal-field label { display: block; font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.07em; margin-bottom: 8px; }
        .modal-field input[type=text], .modal-field input[type=number], .modal-field input[type=file] { width: 100%; padding: 13px 16px; border-radius: 12px; border: 1px solid rgba(100,116,139,0.3); background: rgba(15,23,42,0.8); color: #f8fafc; font-size: 0.95rem; outline: none; transition: border-color 0.2s; }
        .modal-field input:focus { border-color: #38bdf8; box-shadow: 0 0 0 3px rgba(56,189,248,0.12); }
        .modal-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin: 20px 0; }
        .modal-actions { display: flex; gap: 12px; margin-top: 28px; }
        .btn-save { flex: 1; padding: 14px; border-radius: 14px; border: none; background: linear-gradient(135deg, #38bdf8, #818cf8); color: #fff; font-weight: 800; font-size: 1rem; cursor: pointer; transition: all 0.2s; }
        .btn-save:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(56,189,248,0.35); }
        .btn-cancel { flex: 1; padding: 14px; border-radius: 14px; border: 2px solid rgba(100,116,139,0.3); background: transparent; color: #64748b; font-weight: 700; font-size: 1rem; cursor: pointer; transition: all 0.2s; }
        .btn-cancel:hover { border-color: #64748b; color: #94a3b8; }

        @media (max-width: 640px) {
            .summary-grid { grid-template-columns: 1fr 1fr; }
            .modal-grid { grid-template-columns: repeat(2, 1fr); }
            .page-title { font-size: 1.6rem; }
        }
    </style>
</head>
<body x-data x-cloak>
<div class="page-wrapper">

    
    <nav class="top-nav">
        <a href="/pokedex" class="back-link">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 12H5M12 5l-7 7 7 7"/></svg>
            Voltar à Pokédex
        </a>
    </nav>

    
    <?php if(session('success')): ?>
        <div class="flash">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="header-section">
        <div>
            <h1 class="page-title">Meus Pokémon</h1>
            <p class="page-subtitle"><?php echo e($pokemons->count()); ?> pokémon<?php echo e($pokemons->count() !== 1 ? 's' : ''); ?> criado<?php echo e($pokemons->count() !== 1 ? 's' : ''); ?></p>
        </div>
        <button class="btn-add" x-on:click="$store.modal.open = true">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
            Cadastrar Novo
        </button>
    </div>

    
    <form method="GET" action="<?php echo e(url('/pokemon-local')); ?>">
        <div class="controls-bar">
            <input type="text" name="pokemon" value="<?php echo e(request('pokemon')); ?>" placeholder="Buscar por nome..." autocomplete="off" class="ctrl-input">
            <select name="sort" class="ctrl-select">
                <option value="" <?php echo e(!request('sort') ? 'selected' : ''); ?>>Ordenar por...</option>
                <option value="hp"             <?php echo e(request('sort')=='hp'             ? 'selected' : ''); ?>>Maior HP</option>
                <option value="attack"         <?php echo e(request('sort')=='attack'         ? 'selected' : ''); ?>>Maior Ataque</option>
                <option value="defense"        <?php echo e(request('sort')=='defense'        ? 'selected' : ''); ?>>Maior Defesa</option>
                <option value="special_attack" <?php echo e(request('sort')=='special_attack' ? 'selected' : ''); ?>>Maior Atq. Esp.</option>
                <option value="speed"          <?php echo e(request('sort')=='speed'          ? 'selected' : ''); ?>>Maior Velocidade</option>
            </select>
            <button type="submit" class="ctrl-btn">Buscar</button>
            <?php if(request('pokemon') || request('sort')): ?>
                <a href="<?php echo e(url('/pokemon-local')); ?>" class="ctrl-btn" style="background:#334155; text-decoration:none; display:inline-flex; align-items:center;">Limpar</a>
            <?php endif; ?>
        </div>
    </form>

    
    <?php if($pokemons->isNotEmpty()): ?>
    <?php
        $strongest = $pokemons->sortByDesc(fn($p) => $p->hp + $p->attack + $p->defense + $p->special_attack + $p->special_defense + $p->speed)->first();
        $avgTotal  = round($pokemons->avg(fn($p) => $p->hp + $p->attack + $p->defense + $p->special_attack + $p->special_defense + $p->speed));
    ?>
    <div class="summary-grid">
        <div class="summary-card">
            <div class="summary-val" style="color:#38bdf8;"><?php echo e($pokemons->count()); ?></div>
            <div class="summary-label">Total</div>
        </div>
        <div class="summary-card">
            <div class="summary-val" style="color:#34d399;"><?php echo e($avgTotal); ?></div>
            <div class="summary-label">Stats médios</div>
        </div>
        <div class="summary-card">
            <div class="summary-val" style="font-size:1.1rem; color:#fbbf24; padding-top:6px;"><?php echo e(ucfirst($strongest->name)); ?></div>
            <div class="summary-label">Mais forte</div>
        </div>
    </div>
    <?php endif; ?>

    
    <div class="poke-grid">
        <?php $__empty_1 = true; $__currentLoopData = $pokemons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pokemon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $allStats    = ['hp' => $pokemon->hp, 'attack' => $pokemon->attack, 'defense' => $pokemon->defense, 'special_attack' => $pokemon->special_attack, 'special_defense' => $pokemon->special_defense, 'speed' => $pokemon->speed];
            $dominant    = array_search(max($allStats), $allStats);
            $accentMap   = ['hp' => '#ef4444', 'attack' => '#f97316', 'defense' => '#eab308', 'special_attack' => '#a855f7', 'special_defense' => '#06b6d4', 'speed' => '#3b82f6'];
            $accent      = $accentMap[$dominant] ?? '#38bdf8';
            $totalStats  = array_sum($allStats);
            $statLabels  = ['hp' => 'HP', 'attack' => 'ATK', 'defense' => 'DEF', 'special_attack' => 'SPA', 'special_defense' => 'SPD', 'speed' => 'VEL'];
        ?>
        <div class="poke-card" style="--accent: <?php echo e($accent); ?>;">

            
            <div class="poke-img-area">
                <button class="fav-btn-card" data-name="<?php echo e($pokemon->name); ?>" onclick="toggleFavList(this)" title="Favoritar">♡</button>
                <?php if($pokemon->image): ?>
                    <img src="<?php echo e(Storage::url($pokemon->image)); ?>" alt="<?php echo e($pokemon->name); ?>" onerror="this.parentNode.innerHTML+='<div class=no-img-placeholder>?</div>';this.remove()">
                <?php else: ?>
                    <div class="no-img-placeholder">?</div>
                <?php endif; ?>
                <span class="total-badge"><?php echo e($totalStats); ?> pts</span>
            </div>

            
            <div class="poke-body">
                <div class="poke-header-row">
                    <span class="poke-name"><?php echo e(ucfirst($pokemon->name)); ?></span>
                    <span class="poke-num">#<?php echo e(str_pad($pokemon->id, 3, '0', STR_PAD_LEFT)); ?></span>
                </div>

                
                <div class="stat-bars">
                    <?php $__currentLoopData = $allStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="stat-bar-row">
                        <span class="sbl"><?php echo e($statLabels[$key]); ?></span>
                        <div class="sbt"><div class="sbf" style="width: <?php echo e(min(100, ($val / 255) * 100)); ?>%;"></div></div>
                        <span class="sbv"><?php echo e($val); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="card-actions">
                    <button class="action-edit"
                        @click="$store.editModal.show({
                            id: <?php echo e($pokemon->id); ?>,
                            name: '<?php echo e(addslashes($pokemon->name)); ?>',
                            hp: <?php echo e($pokemon->hp); ?>,
                            attack: <?php echo e($pokemon->attack); ?>,
                            defense: <?php echo e($pokemon->defense); ?>,
                            special_attack: <?php echo e($pokemon->special_attack); ?>,
                            special_defense: <?php echo e($pokemon->special_defense); ?>,
                            speed: <?php echo e($pokemon->speed); ?>

                        })">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        Editar
                    </button>
                    <form action="<?php echo e(route('pokemon.destroy', $pokemon->id)); ?>" method="POST" onsubmit="return confirm('Excluir <?php echo e(addslashes(ucfirst($pokemon->name))); ?>?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="action-del">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty-state">
            <div style="font-size:4rem; margin-bottom:16px; opacity:0.2;">◎</div>
            <?php $termoBusca = trim((string) request('pokemon')); ?>
            <h3 style="font-size:1.4rem; font-weight:800; color:#475569; margin:0 0 8px;">Nenhum Pokémon encontrado</h3>
            <?php if(!empty($termoBusca)): ?>
                <p style="color:#334155; margin:0 0 24px;">Sem resultados para "<?php echo e($termoBusca); ?>".</p>
            <?php else: ?>
                <p style="color:#334155; margin:0 0 24px;">Crie seu primeiro Pokémon personalizado!</p>
            <?php endif; ?>
            <button class="btn-add" style="margin:0 auto;" x-on:click="$store.modal.open = true">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Cadastrar agora
            </button>
        </div>
        <?php endif; ?>
    </div>
</div>


<?php echo $__env->make('components.pokemon-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<div class="modal-bg" x-show="$store.editModal.visible" @click.self="$store.editModal.close()" @keydown.escape.window="$store.editModal.close()">
    <div class="modal-box" @click.stop>
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:28px;">
            <h2 class="modal-title" style="margin:0;">Editar Pokémon</h2>
            <button @click="$store.editModal.close()" style="background:none;border:none;color:#475569;cursor:pointer;padding:6px;">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form :action="'/pokemon/' + $store.editModal.id" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="modal-field" style="margin-bottom:18px;">
                <label>Nome do Pokémon</label>
                <input type="text" name="name" x-model="$store.editModal.name" required maxlength="50">
            </div>

            <div class="modal-grid">
                <div class="modal-field">
                    <label>HP</label>
                    <input type="number" name="hp" x-model.number="$store.editModal.hp" min="1" max="255" required>
                </div>
                <div class="modal-field">
                    <label>Ataque</label>
                    <input type="number" name="attack" x-model.number="$store.editModal.attack" min="1" max="255" required>
                </div>
                <div class="modal-field">
                    <label>Defesa</label>
                    <input type="number" name="defense" x-model.number="$store.editModal.defense" min="1" max="255" required>
                </div>
                <div class="modal-field">
                    <label>Atq. Especial</label>
                    <input type="number" name="special_attack" x-model.number="$store.editModal.special_attack" min="1" max="255" required>
                </div>
                <div class="modal-field">
                    <label>Def. Especial</label>
                    <input type="number" name="special_defense" x-model.number="$store.editModal.special_defense" min="1" max="255" required>
                </div>
                <div class="modal-field">
                    <label>Velocidade</label>
                    <input type="number" name="speed" x-model.number="$store.editModal.speed" min="1" max="255" required>
                </div>
            </div>

            <div class="modal-field" style="margin-bottom:0;">
                <label>Nova imagem (opcional)</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="modal-actions">
                <button type="submit" class="btn-save">Salvar alterações</button>
                <button type="button" class="btn-cancel" @click="$store.editModal.close()">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
const FAV_KEY = 'pokemon_favorites';
function getFavs() { return JSON.parse(localStorage.getItem(FAV_KEY) || '[]'); }
function toggleFavList(btn) {
    const name = btn.dataset.name;
    const favs = getFavs();
    const idx  = favs.indexOf(name);
    if (idx === -1) favs.push(name); else favs.splice(idx, 1);
    localStorage.setItem(FAV_KEY, JSON.stringify(favs));
    updateHearts();
}
function updateHearts() {
    const favs = getFavs();
    document.querySelectorAll('.fav-btn-card').forEach(btn => {
        const isFav = favs.includes(btn.dataset.name);
        btn.textContent = isFav ? '♥' : '♡';
        btn.style.color = isFav ? '#ef4444' : '';
    });
}
updateHearts();
</script>
</body>
</html>
<?php /**PATH C:\laragon\www\Ramos\BackEnd\Aula 9\Pokemon\resources\views/pokemon-list.blade.php ENDPATH**/ ?>