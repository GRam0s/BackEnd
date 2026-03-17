<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{

    // Lista todos os produtos
    public function index()
    {
        $produtos = Produto::all(); 
        return view('produtos.index', compact('produtos'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        return view('produtos.create');
    }

    // Salva o produto no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer|min:0',
        ]);

        // Limpar e formatar valores antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['preco'] = formatar_moeda(limpar_moeda($dados['preco']));

        Produto::create($dados);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    // Abre tela de edição
    public function edit(Produto $produto)
    {
        // Formatar dados para exibição
        $produto->preco = formatar_moeda(limpar_moeda($produto->preco));
        
        return view('produtos.edit', compact('produto'));
    }

    // Atualiza produto
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer|min:0',
        ]);

        // Limpar e formatar valores antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['preco'] = formatar_moeda(limpar_moeda($dados['preco']));

        $produto->update($dados);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    // Exclui produto
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto removido!');
    }

}