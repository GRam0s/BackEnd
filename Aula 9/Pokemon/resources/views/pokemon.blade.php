<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex Pixel</title>

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Press Start 2P', cursive;
        }

        .pixel-box {
            border: 4px solid black;
            box-shadow: 6px 6px 0px black;
        }

        .pixel-btn {
            border: 3px solid black;
            box-shadow: 4px 4px 0px black;
        }

        .pixel-btn:active {
            transform: translate(4px, 4px);
            box-shadow: none;
        }

        .barra {
            height: 10px;
            background: #0f380f;
        }

        .barra-fill {
            height: 100%;
            background: #306230;
        }
    </style>
</head>

<body class="bg-green-200 flex items-center justify-center min-h-screen">

    <div class="bg-green-300 p-6 pixel-box w-96 text-center">

        <!-- Nome -->
        <h1 class="text-sm mb-3 uppercase">
            {{ $pokemon['name'] }}
        </h1>

        @php
            $regiao = match(true) {
                $pokemon['id'] <= 151 => 'Kanto',
                $pokemon['id'] <= 251 => 'Johto',
                $pokemon['id'] <= 386 => 'Hoenn',
                $pokemon['id'] <= 493 => 'Sinnoh',
                $pokemon['id'] <= 649 => 'Unova',
                $pokemon['id'] <= 721 => 'Kalos',
                $pokemon['id'] <= 809 => 'Alola',
                $pokemon['id'] <= 905 => 'Galar',
                default => 'Paldea'
            };

            // tradução dos stats
            $traducaoStats = [
                'hp' => 'VIDA',
                'attack' => 'ATAQUE',
                'defense' => 'DEFESA',
                'special-attack' => 'ATQ. ESP',
                'special-defense' => 'DEF. ESP',
                'speed' => 'VELOCIDADE'
            ];
        @endphp

        <p class="text-[10px] mb-3">
            Nº {{ str_pad($pokemon['id'], 3, '0', STR_PAD_LEFT) }} - {{ strtoupper($regiao) }}
        </p>

        <!-- Busca -->
        <form method="GET" action="{{ url('/pokedex') }}" class="mb-4">
            <input
                type="text"
                name="pokemon"
                value="{{ request('pokemon') }}"
                placeholder="buscar pokemon"
                class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-green-100 outline-none"
            />

            <button type="submit"
                class="pixel-btn bg-green-500 text-[10px] px-3 py-2 w-full">
                BUSCAR
            </button>
        </form>

        <!-- Imagem -->
        <div class="bg-green-100 p-4 pixel-box mb-4">
            <img src="{{ $pokemon['sprites']['front_default'] }}"
                alt="{{ $pokemon['name'] }}"
                class="mx-auto w-24 h-24"
                style="image-rendering: pixelated;">
        </div>

        <!-- Tipos -->
        <div class="mb-3 text-[10px]">
            @foreach ($pokemon['types'] as $tipo)
                <span class="inline-block border-2 border-black px-2 py-1 mr-1 bg-green-400">
                    {{ strtoupper($tipo['type']['name']) }}
                </span>
            @endforeach
        </div>

        <!-- Info -->
        <p class="text-[10px] mb-4">
            ALTURA {{ $pokemon['height']/10 }}m<br>
            PESO {{ $pokemon['weight']/10 }}kg
        </p>

        <!-- Stats -->
        <div class="text-left text-[10px] mb-4">

            @foreach ($pokemon['stats'] as $stat)
                @php
                    $nome = $stat['stat']['name'];
                    $valor = $stat['base_stat'];

                    // normaliza (máx 255)
                    $porcentagem = min(100, ($valor / 255) * 100);
                @endphp

                <div class="mb-2">
                    <div class="flex justify-between">
                        <span>{{ $traducaoStats[$nome] ?? strtoupper($nome) }}</span>
                        <span>{{ $valor }}</span>
                    </div>

                    <div class="w-full barra">
                        <div class="barra-fill"
                             style="width: {{ $porcentagem }}%">
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Botão -->
        <button
            onclick="window.location.reload()"
            class="pixel-btn bg-green-600 text-[10px] px-3 py-2 w-full">
            PROXIMO
        </button>

    </div>

</body>
</html>