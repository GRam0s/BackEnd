<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Editar Pedido
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur overflow-hidden shadow-xl sm:rounded-lg border-l-4 border-red-500">
                <div class="p-8">
                    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-form-input
                                label="Cliente"
                                name="cliente"
                                type="text"
                                value="{{ $pedido->cliente }}"
                                placeholder="Nome do cliente"
                                icon="user"
                                required
                            />

                            <x-form-input
                                label="Produto"
                                name="produto"
                                type="text"
                                value="{{ $pedido->produto }}"
                                placeholder="Nome do produto"
                                icon="package"
                                required
                            />

                            <x-form-input
                                label="Quantidade"
                                name="quantidade"
                                type="number"
                                value="{{ $pedido->quantidade }}"
                                placeholder="0"
                                icon="hash"
                                required
                            />

                            <x-form-input
                                label="Valor Total"
                                name="valor"
                                type="text"
                                value="{{ $pedido->valor }}"
                                placeholder="R$ 0,00"
                                icon="dollar-sign"
                                mask="currency"
                                required
                            />
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <a href="{{ route('pedidos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Cancelar
                            </a>

                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Atualizar Pedido
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