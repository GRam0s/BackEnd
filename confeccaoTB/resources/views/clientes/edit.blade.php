<div class="py-12 bg-gradient-to-br from-gray-100 via-gray-50 to-gray-200 min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden transition hover:shadow-3xl">
            
            <div class="p-10">
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <x-form-input
                            label="Nome Completo"
                            name="nome"
                            type="text"
                            value="{{ $cliente->nome }}"
                            placeholder="Digite o nome completo"
                            icon="user"
                            required
                            class="focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        />

                        <x-form-input
                            label="CPF"
                            name="cpf"
                            type="text"
                            value="{{ $cliente->cpf }}"
                            placeholder="000.000.000-00"
                            icon="credit-card"
                            mask="cpf"
                            required
                            class="focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        />

                        <x-form-input
                            label="Email"
                            name="email"
                            type="email"
                            value="{{ $cliente->email }}"
                            placeholder="cliente@email.com"
                            icon="mail"
                            required
                            class="focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        />

                        <x-form-input
                            label="Telefone"
                            name="telefone"
                            type="text"
                            value="{{ $cliente->telefone }}"
                            placeholder="(11) 99999-9999"
                            icon="phone"
                            mask="phone"
                            required
                            class="focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        />
                    </div>

                    <div class="mt-4">
                        <x-form-input
                            label="Endereço"
                            name="endereco"
                            type="text"
                            value="{{ $cliente->endereco }}"
                            placeholder="Digite o endereço completo"
                            icon="map-pin"
                            class="focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        />
                    </div>

                    <!-- Botões -->
                    <div class="flex items-center justify-between pt-8 border-t border-gray-100">

                        <a href="{{ route('clientes.index') }}"
                           class="inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-600 rounded-lg font-medium hover:bg-gray-200 hover:text-gray-800 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancelar
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-md hover:shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                            
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>

                            Atualizar Cliente
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>