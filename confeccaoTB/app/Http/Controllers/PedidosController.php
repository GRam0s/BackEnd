<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index() {
        $clientes= \App\Models\CPedidos::all();
        return view('pedidos.index', compact('pedidos'));
    }
}
