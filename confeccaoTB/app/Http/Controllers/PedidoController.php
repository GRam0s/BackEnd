<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{

    // Lista todos os pedidos
    public function index()
    {
        $pedidos = Pedido::all(); 
        return view('pedidos.index', compact('pedidos'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        return view('pedidos.create');
    }

    // Salva o pedido no banco
    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'produto' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'valor' => 'required|numeric',
        ]);

        // Limpar e formatar valores antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['valor'] = formatar_moeda(limpar_moeda($dados['valor']));

        Pedido::create($dados);

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido cadastrado com sucesso!');
    }

    // Abre tela de edição
    public function edit(Pedido $pedido)
    {
        // Formatar dados para exibição
        $pedido->valor = formatar_moeda(limpar_moeda($pedido->valor));
        
        return view('pedidos.edit', compact('pedido'));
    }

    // Atualiza pedido
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'produto' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'valor' => 'required|numeric',
        ]);

        // Limpar e formatar valores antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['valor'] = formatar_moeda(limpar_moeda($dados['valor']));

        $pedido->update($dados);

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido atualizado com sucesso!');
    }

    // Exclui pedido
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido removido!');
    }

}