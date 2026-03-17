<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            Editar Fornecedor
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur overflow-hidden shadow-xl sm:rounded-lg border-l-4 border-green-500">
                <div class="p-8">
                    <form action="{{ route('fornecedores.update', $fornecedor) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-form-input
                                label="Nome da Empresa"
                                name="nome"
                                type="text"
                                value="{{ $fornecedor->nome }}"
                                placeholder="Digite o nome da empresa"
                                icon="building"
                                required
                            />

                            <x-form-input
                                label="CNPJ"
                                name="cnpj"
                                type="text"
                                value="{{ $fornecedor->cnpj }}"
                                placeholder="00.000.000/0000-00"
                                icon="credit-card"
                                mask="cnpj"
                                required
                            />

                            <x-form-input
                                label="Email"
                                name="email"
                                type="email"
                                value="{{ $fornecedor->email }}"
                                placeholder="contato@empresa.com"
                                icon="mail"
                                required
                            />

                            <x-form-input
                                label="Telefone"
                                name="telefone"
                                type="text"
                                value="{{ $fornecedor->telefone }}"
                                placeholder="(11) 99999-9999"
                                icon="phone"
                                mask="phone"
                                required
                            />
                        </div>

                        <x-form-input
                            label="Endereço"
                            name="endereco"
                            type="text"
                            value="{{ $fornecedor->endereco }}"
                            placeholder="Digite o endereço completo da empresa"
                            icon="map-pin"
                        />

                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <a href="{{ route('fornecedores.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Cancelar
                            </a>

                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Atualizar Fornecedor
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