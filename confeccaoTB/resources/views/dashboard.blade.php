<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-3xl text-gray-900">Dashboard</h2>
                <p class="text-gray-500 mt-1">Bem-vindo ao seu painel de controle</p>
            </div>
            <div class="text-gray-400 text-sm">
                {{ date('d/m/Y') }}
            </div>
        </div>
    </x-slot>

    <div class="bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Cards de Status - Linha Superior -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
                <!-- Card Clientes -->
                <a href="{{ route('clientes.index') }}" class="group">
                    <div class="relative bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">
                        <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-blue-400 to-blue-600"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors">
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Ativo</span>
                            </div>
                            <p class="text-gray-600 text-sm font-medium mb-1">Clientes</p>
                            <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $totalClientes }}</h3>
                            <p class="text-xs text-gray-500">{{ $totalClientes > 1 ? 'clientes cadastrados' : 'cliente cadastrado' }}</p>
                        </div>
                    </div>
                </a>

                <!-- Card Pedidos -->
                <a href="{{ route('pedidos.index') }}" class="group">
                    <div class="relative bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-green-200">
                        <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-green-400 to-green-600"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-green-50 rounded-lg group-hover:bg-green-100 transition-colors">
                                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3z"/>
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">{{ $totalPedidos > 0 ? 'Processando' : 'Parado' }}</span>
                            </div>
                            <p class="text-gray-600 text-sm font-medium mb-1">Pedidos</p>
                            <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $totalPedidos }}</h3>
                            <p class="text-xs text-gray-500 font-semibold text-green-600">R$ {{ number_format($valorTotalPedidos, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </a>

                <!-- Card Fornecedores -->
                <a href="{{ route('fornecedores.index') }}" class="group">
                    <div class="relative bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-purple-200">
                        <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-purple-400 to-purple-600"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-purple-50 rounded-lg group-hover:bg-purple-100 transition-colors">
                                    <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2h2a2 2 0 110 4h-2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2H0a2 2 0 110-4h2V6zm2 2v2h12V8H4z"/>
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Ativo</span>
                            </div>
                            <p class="text-gray-600 text-sm font-medium mb-1">Fornecedores</p>
                            <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $totalFornecedores }}</h3>
                            <p class="text-xs text-gray-500">{{ $totalFornecedores > 1 ? 'fornecedores cadastrados' : 'fornecedor cadastrado' }}</p>
                        </div>
                    </div>
                </a>

                <!-- Card Estoque -->
                <a href="{{ route('estoques.index') }}" class="group">
                    <div class="relative bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-orange-200">
                        <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-orange-400 to-orange-600"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-orange-50 rounded-lg group-hover:bg-orange-100 transition-colors">
                                    <svg class="w-6 h-6 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4V5h12v10zm-10-6a1 1 0 11-2 0 1 1 0 012 0zm6 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">{{ $totalItensEstoque > 0 ? 'Disponível' : 'Vazio' }}</span>
                            </div>
                            <p class="text-gray-600 text-sm font-medium mb-1">Estoque</p>
                            <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $totalItensEstoque }}</h3>
                            <p class="text-xs text-gray-500 font-semibold text-orange-600">R$ {{ number_format($valorTotalEstoque, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </a>

                <!-- Card Produtos -->
                <a href="{{ route('produtos.index') }}" class="group">
                    <div class="relative bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-red-200">
                        <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-red-400 to-red-600"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-red-50 rounded-lg group-hover:bg-red-100 transition-colors">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M7 2a1 1 0 000 2h6a1 1 0 100-2H7zM4 5a2 2 0 012-2 1 1 0 000 2H4zm12 0h-2a1 1 0 000 2 2 2 0 012-2zM4 11a1 1 0 100 2h12a1 1 0 100-2H4z"/>
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold text-red-600 bg-red-50 px-3 py-1 rounded-full">Ativo</span>
                            </div>
                            <p class="text-gray-600 text-sm font-medium mb-1">Produtos</p>
                            <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $totalProdutos }}</h3>
                            <p class="text-xs text-gray-500">{{ $totalProdutos > 1 ? 'produtos cadastrados' : 'produto cadastrado' }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Seção de Últimos Registros -->
            <div class="mt-8">
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Últimos Registros</h3>
                    <p class="text-gray-500 text-sm mt-1">Acompanhe os dados mais recentes do seu sistema</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Últimos Clientes -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Últimos Clientes</h3>
                            <p class="text-sm text-gray-500 mt-1">5 clientes mais recentes</p>
                        </div>
                        <a href="{{ route('clientes.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-semibold">Ver todos →</a>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($ultimosClientes as $cliente)
                            <div class="p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <p class="text-gray-900 font-semibold">{{ $cliente->nome }}</p>
                                        <p class="text-gray-500 text-sm mt-1">📧 {{ $cliente->email ?? 'Sem email' }}</p>
                                        <p class="text-gray-500 text-sm">📱 {{ $cliente->telefone ?? 'Sem telefone' }}</p>
                                    </div>
                                    <span class="text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded font-semibold">Novo</span>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                </svg>
                                <p>Nenhum cliente cadastrado</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Últimos Pedidos -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Últimos Pedidos</h3>
                            <p class="text-sm text-gray-500 mt-1">5 pedidos mais recentes</p>
                        </div>
                        <a href="{{ route('pedidos.index') }}" class="text-green-600 hover:text-green-700 text-sm font-semibold">Ver todos →</a>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @if($totalPedidos > 0)
                            @forelse(Illuminate\Support\Facades\DB::table('pedidos')->latest()->take(5)->get() as $pedido)
                                <div class="p-4 hover:bg-gray-50 transition-colors">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2">
                                                <span class="font-semibold text-gray-900">Pedido #{{ $pedido->id }}</span>
                                                <span class="text-xs bg-green-50 text-green-700 px-2 py-1 rounded font-semibold">Processando</span>
                                            </div>
                                            <p class="text-gray-500 text-sm mt-1">👤 {{ $pedido->cliente }}</p>
                                            <p class="text-gray-500 text-sm">📦 {{ $pedido->quantidade ?? 1 }} unidade(s)</p>
                                        </div>
                                        <p class="text-green-600 font-bold text-right">R$ {{ $pedido->valor }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="p-8 text-center text-gray-500">
                                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3z"/>
                                    </svg>
                                    <p>Nenhum pedido registrado</p>
                                </div>
                            @endforelse
                        @else
                            <div class="p-8 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3z"/>
                                </svg>
                                <p>Nenhum pedido registrado</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Últimos Fornecedores -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Últimos Fornecedores</h3>
                            <p class="text-sm text-gray-500 mt-1">5 fornecedores mais recentes</p>
                        </div>
                        <a href="{{ route('fornecedores.index') }}" class="text-purple-600 hover:text-purple-700 text-sm font-semibold">Ver todos →</a>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($ultimosFornecedores as $fornecedor)
                            <div class="p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <p class="text-gray-900 font-semibold">{{ $fornecedor->nome }}</p>
                                        <p class="text-gray-500 text-sm mt-1">📧 {{ $fornecedor->email ?? 'Sem email' }}</p>
                                        <p class="text-gray-500 text-sm">📱 {{ $fornecedor->telefone ?? 'Sem telefone' }}</p>
                                    </div>
                                    <span class="text-xs bg-purple-50 text-purple-700 px-2 py-1 rounded font-semibold">Parceiro</span>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2h2a2 2 0 110 4h-2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2H0a2 2 0 110-4h2V6zm2 2v2h12V8H4z"/>
                                </svg>
                                <p>Nenhum fornecedor cadastrado</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Últimos Produtos -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Últimos Produtos</h3>
                            <p class="text-sm text-gray-500 mt-1">5 produtos mais recentes</p>
                        </div>
                        <a href="{{ route('produtos.index') }}" class="text-red-600 hover:text-red-700 text-sm font-semibold">Ver todos →</a>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($ultimosProdutos as $produto)
                            <div class="p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <p class="text-gray-900 font-semibold">{{ $produto->nome }}</p>
                                        <p class="text-gray-500 text-sm mt-1">{{ Str::limit($produto->descricao ?? 'Sem descrição', 50) }}</p>
                                        <p class="text-gray-500 text-sm">📦 {{ $produto->estoque ?? 0 }} unidades</p>
                                    </div>
                                    <span class="text-red-600 font-bold text-right">R$ {{ $produto->preco ?? '0,00' }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M7 2a1 1 0 000 2h6a1 1 0 100-2H7zM4 5a2 2 0 012-2 1 1 0 000 2H4zm12 0h-2a1 1 0 000 2 2 2 0 012-2zM4 11a1 1 0 100 2h12a1 1 0 100-2H4z"/>
                                </svg>
                                <p>Nenhum produto cadastrado</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
