<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pedidos da Confecção') }}
            </h2>

            <a href="{{ route('pedidos.create') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md text-xs text-white uppercase hover:bg-gray-700">
                + Novo Pedido
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @forelse ($pedidos as $pedido)

                        <div class="flex flex-col justify-between border p-5 rounded-lg hover:shadow-lg transition bg-gray-50">

                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">
                                    Cliente: {{ $pedido->cliente }}
                                </h3>

                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Produto:</span>
                                    {{ $pedido->produto }}
                                </p>

                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Quantidade:</span>
                                    {{ $pedido->quantidade }}
                                </p>

                                <p class="text-sm text-green-700 font-semibold">
                                    Valor: R$ {{ $pedido->valor }}
                                </p>
                            </div>

                            <!-- Botões -->
                            <div class="flex justify-end mt-6 pt-4 border-t space-x-4">

                                <a href="{{ route('pedidos.edit', $pedido->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold">
                                    Editar
                                </a>

                                <form action="{{ route('pedidos.destroy', $pedido->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este pedido?')">

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
                                Nenhum pedido cadastrado até o momento.
                            </p>
                        </div>
                    @endforelse

                </div>

            </div>
        </div>
    </div>
</x-app-layout>