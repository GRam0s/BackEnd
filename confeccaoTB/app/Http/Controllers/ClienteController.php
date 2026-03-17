<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Lista todos os clientes
    public function index() 
    {
        $clientes = Cliente::all(); 
        return view('clientes.index', compact('clientes'));
    }

    // Exibe o formulário de cadastro (a janela/página de inserção)
    public function create() 
    {
        return view('clientes.create');
    }

    // Recebe os dados do formulário e salva no banco de dados
    public function store(Request $request) 
    {
        // 1. Validação simples para evitar dados vazios ou duplicados
        $request->validate([
            'nome'     => 'required|string|max:255',
            'cpf'      => 'required|string|unique:clientes',
            'email'    => 'required|email|unique:clientes',
            'telefone' => 'required|string',
            'endereco' => 'nullable|string',
        ]);

        // 2. Limpar e formatar os dados antes de salvar (aceita formatos limpos ou já formatados)
        $dados = $request->all();
        $dados['cpf'] = formatar_cpf(limpar_cpf($dados['cpf']));
        $dados['telefone'] = formatar_telefone(limpar_telefone($dados['telefone']));

        // 3. Salva o novo cliente
        Cliente::create($dados);

        // 4. Redireciona de volta para a lista com uma mensagem de sucesso
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }
        // Abre a tela de edição
        public function edit(Cliente $cliente) 
    {
            // Formatar dados para exibição
            $cliente->cpf = formatar_cpf($cliente->cpf);
            $cliente->telefone = formatar_telefone($cliente->telefone);
            
            return view('clientes.edit', compact('cliente'));
        }
        
        // Salva a alteração no banco
        public function update(Request $request, Cliente $cliente) 
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|unique:clientes,cpf,' . $cliente->id,
        'email' => 'required|email|unique:clientes,email,' . $cliente->id,
        'telefone' => 'required',
    ]);

    // Limpar e formatar os dados antes de salvar (aceita formatos limpos ou já formatados)
    $dados = $request->all();
    $dados['cpf'] = formatar_cpf(limpar_cpf($dados['cpf']));
    $dados['telefone'] = formatar_telefone(limpar_telefone($dados['telefone']));

    $cliente->update($dados);
    return redirect()->route('clientes.index')->with('success', 'Cliente atualizado!');
}

// Exclui o cliente
public function destroy(Cliente $cliente) 
{
    $cliente->delete();
    return redirect()->route('clientes.index')->with('success', 'Cliente removido!');
}

}
