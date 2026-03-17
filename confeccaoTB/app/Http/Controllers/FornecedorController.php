<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    // Lista todos os fornecedores
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        return view('fornecedores.create');
    }

    // Salva fornecedor no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|unique:fornecedores',
            'email' => 'required|email|unique:fornecedores',
            'telefone' => 'required|string',
            'endereco' => 'nullable|string',
        ]);

        // Limpar e formatar os dados antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['cnpj'] = formatar_cnpj(limpar_cnpj($dados['cnpj']));
        $dados['telefone'] = formatar_telefone(limpar_telefone($dados['telefone']));

        Fornecedor::create($dados);

        return redirect()->route('fornecedores.index')
            ->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    // Abre tela de edição
    public function edit(Fornecedor $fornecedor)
    {
        // Formatar dados para exibição
        $fornecedor->cnpj = formatar_cnpj($fornecedor->cnpj);
        $fornecedor->telefone = formatar_telefone($fornecedor->telefone);
        
        return view('fornecedores.edit', compact('fornecedor'));
    }

    // Atualiza fornecedor
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|unique:fornecedores,cnpj,' . $fornecedor->id,
            'email' => 'required|email|unique:fornecedores,email,' . $fornecedor->id,
            'telefone' => 'required',
            'endereco' => 'nullable|string',
        ]);

        // Limpar e formatar os dados antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['cnpj'] = formatar_cnpj(limpar_cnpj($dados['cnpj']));
        $dados['telefone'] = formatar_telefone(limpar_telefone($dados['telefone']));

        $fornecedor->update($dados);

        return redirect()->route('fornecedores.index')
            ->with('success', 'Fornecedor atualizado!');
    }

    // Exclui fornecedor
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        return redirect()->route('fornecedores.index')
            ->with('success', 'Fornecedor removido!');
    }
}