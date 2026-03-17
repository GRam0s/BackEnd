<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Fornecedor;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Clientes
        $totalClientes = Cliente::count();
        $ultimosClientes = Cliente::latest()->take(5)->get();

        // Pedidos
        $totalPedidos = Pedido::count();
        $valorTotalPedidos = Pedido::all()->sum(fn($p) => limpar_moeda($p->valor)) ?? 0;

        // Fornecedores
        $totalFornecedores = Fornecedor::count();
        $ultimosFornecedores = Fornecedor::latest()->take(5)->get();

        // Estoque
        $totalItensEstoque = Estoque::sum('quantidade') ?? 0;
        $valorTotalEstoque = Estoque::all()->sum(fn($e) => $e->quantidade * limpar_moeda($e->preco_custo)) ?? 0;

        // Produtos
        $totalProdutos = Produto::count();
        $ultimosProdutos = Produto::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalClientes', 'ultimosClientes',
            'totalPedidos', 'valorTotalPedidos',
            'totalFornecedores', 'ultimosFornecedores',
            'totalItensEstoque', 'valorTotalEstoque',
            'totalProdutos', 'ultimosProdutos'
        ));
    }
}

