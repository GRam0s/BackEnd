<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{

    // Lista todos os produtos do estoque
    public function index()
    {
        $estoques = Estoque::all(); 
        return view('estoques.index', compact('estoques'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        return view('estoques.create');
    }

    // Salva o produto no banco
    public function store(Request $request)
    {
        $request->validate([
            'produto' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'preco_custo' => 'required|numeric',
            'preco_venda' => 'required|numeric',
            'fornecedor' => 'nullable|string|max:255',
        ]);

        // Limpar e formatar valores antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['preco_custo'] = formatar_moeda(limpar_moeda($dados['preco_custo']));
        $dados['preco_venda'] = formatar_moeda(limpar_moeda($dados['preco_venda']));

        Estoque::create($dados);

        return redirect()->route('estoques.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    // Abre tela de edição
    public function edit(Estoque $estoque)
    {
        // Formatar dados para exibição
        $estoque->preco_custo = formatar_moeda(limpar_moeda($estoque->preco_custo));
        $estoque->preco_venda = formatar_moeda(limpar_moeda($estoque->preco_venda));
        
        return view('estoques.edit', compact('estoque'));
    }

    // Atualiza produto
    public function update(Request $request, Estoque $estoque)
    {
        $request->validate([
            'produto' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'preco_custo' => 'required|numeric',
            'preco_venda' => 'required|numeric',
            'fornecedor' => 'nullable|string|max:255',
        ]);

        // Limpar e formatar valores antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['preco_custo'] = formatar_moeda(limpar_moeda($dados['preco_custo']));
        $dados['preco_venda'] = formatar_moeda(limpar_moeda($dados['preco_venda']));

        $estoque->update($dados);

        return redirect()->route('estoques.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    // Exclui produto
    public function destroy(Estoque $estoque)
    {
        $estoque->delete();

        return redirect()->route('estoques.index')
            ->with('success', 'Produto removido!');
    }

}