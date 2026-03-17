<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Estoque de Produtos') }}
            </h2>

            <a href="{{ route('estoques.create') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                + Novo Produto
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Mensagem de Sucesso -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm rounded-r">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @forelse ($estoques as $estoque)

                        <div class="flex flex-col justify-between border border-gray-200 p-5 rounded-lg hover:shadow-lg transition bg-gray-50">

                            <div>
                                <h3 class="font-bold text-xl text-gray-900 mb-2">
                                    {{ $estoque->produto }}
                                </h3>

                                <p class="text-sm text-gray-600 mb-1">
                                    <span class="font-semibold text-gray-800">Quantidade:</span>
                                    {{ $estoque->quantidade }}
                                </p>

                                <p class="text-sm text-gray-600 mb-1">
                                    <span class="font-semibold text-gray-800">Custo:</span>
                                    R$ {{ $estoque->preco_custo }}
                                </p>

                                <p class="text-sm text-green-600 font-medium">
                                    <span class="font-semibold">Venda:</span>
                                    R$ {{ $estoque->preco_venda }}
                                </p>

                                <p class="text-sm text-indigo-600 font-medium mt-2">
                                    <span class="mr-1">🏢</span>
                                    {{ $estoque->fornecedor }}
                                </p>
                            </div>

                            <!-- Botões -->
                            <div class="flex items-center justify-end mt-6 pt-4 border-t border-gray-200 space-x-4">

                                <a href="{{ route('estoques.edit', $estoque->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold">
                                    Editar
                                </a>

                                <form action="{{ route('estoques.destroy', $estoque->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-red-500 hover:text-red-700 text-sm font-semibold">
                                        Excluir
                                    </button>

                                </form>

                            </div>

                        </div>

                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-400 text-lg italic">
                                Nenhum produto no estoque até o momento.
                            </p>
                        </div>
                    @endforelse

                </div>

            </div>

        </div>
    </div>
</x-app-layout>