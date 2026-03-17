<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-3xl text-gray-900">Cadastrar Novo Produto</h2>
                <p class="text-gray-500 text-sm mt-1">Crie um novo produto no catálogo</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur rounded-2xl shadow-xl border border-gray-200 p-8">
                
                <form action="{{ route('produtos.store') }}" method="POST">
                    @csrf

                    <x-form-input
                        label="Nome do Produto"
                        name="nome"
                        type="text"
                        required
                    />

                    <x-form-input
                        label="Descrição"
                        name="descricao"
                        type="textarea"
                    />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-form-input
                            label="Preço (R$)"
                            name="preco"
                            type="text"
                            required
                            mask="currency"
                        />

                        <x-form-input
                            label="Estoque"
                            name="estoque"
                            type="number"
                            required
                        />
                    </div>

                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('produtos.index') }}" class="inline-flex items-center px-6 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 font-medium transition">
                            ← Voltar
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-blue-600 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-700 active:bg-blue-800 transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
                            Salvar Produto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/form-mask.js') }}"></script>
    @endpush
</x-app-layout>