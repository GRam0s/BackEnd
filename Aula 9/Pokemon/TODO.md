# TODO

## Pokémon - Tela de listagem local
- [x] Atualizar `PokemonController@list(Request $request)` para filtrar `Pokemon` por `?pokemon=` (LOWER(name) LIKE ...)
- [x] Atualizar `resources/views/pokemon-list.blade.php` para incluir barra de pesquisa (GET /pokemon-local)
- [x] Ajustar mensagem de vazio considerando o termo buscado
- [ ] Testar manualmente rota `/pokemon-local` com e sem parâmetro `pokemon`

