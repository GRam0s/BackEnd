<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <svg class="w-6 h-6 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            Editar Produto do Estoque
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur overflow-hidden shadow-xl sm:rounded-lg border-l-4 border-orange-500">
                <div class="p-8">
                    <form action="{{ route('estoques.update', $estoque) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-form-input
                                label="Nome do Produto"
                                name="produto"
                                type="text"
                                value="{{ $estoque->produto }}"
                                placeholder="Digite o nome do produto"
                                icon="package"
                                required
                            />

                            <x-form-input
                                label="Quantidade"
                                name="quantidade"
                                type="number"
                                value="{{ $estoque->quantidade }}"
                                placeholder="0"
                                icon="hash"
                                required
                            />

                            <x-form-input
                                label="Preço de Custo"
                                name="preco_custo"
                                type="text"
                                value="{{ $estoque->preco_custo }}"
                                placeholder="R$ 0,00"
                                icon="dollar-sign"
                                mask="currency"
                                required
                            />

                            <x-form-input
                                label="Preço de Venda"
                                name="preco_venda"
                                type="text"
                                value="{{ $estoque->preco_venda }}"
                                placeholder="R$ 0,00"
                                icon="dollar-sign"
                                mask="currency"
                                required
                            />

                            <x-form-input
                                label="Fornecedor"
                                name="fornecedor"
                                type="text"
                                value="{{ $estoque->fornecedor }}"
                                placeholder="Nome do fornecedor (opcional)"
                                icon="building"
                            />
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <a href="{{ route('estoques.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Cancelar
                            </a>

                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Atualizar Produto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/form-mask.js') }}"></script>
    @endpush
</x-app-layout>

            </div>
        </div>
    </div>
</x-app-layout>