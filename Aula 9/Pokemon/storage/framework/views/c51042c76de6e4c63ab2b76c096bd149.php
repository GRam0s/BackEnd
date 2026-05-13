<div x-show="$store.modal.open" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto bg-black/50" @click="$store.modal.open = false" @keydown.escape.window="$store.modal.open = false">
    <div class="flex min-h-full items-center justify-center p-4" @click.stop>
        <div class="relative w-full max-w-2xl transform rounded-2xl bg-slate-900/95 border-2 border-emerald-500/50 p-8 shadow-2xl backdrop-blur-xl" @click.stop>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-emerald-400 to-teal-500 bg-clip-text text-transparent">
                    Novo Pokémon
                </h2>
                <button type="button" @click="$store.modal.open = false" class="p-2 rounded-xl hover:bg-slate-800/50 transition-all duration-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="<?php echo e(route('pokemon.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?php echo csrf_field(); ?>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-3">Nome do Pokémon</label>
                    <input type="text" name="name" required class="w-full p-4 rounded-xl border border-slate-700/50 bg-slate-800/50 text-white placeholder-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-200" placeholder="Digite o nome...">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">HP</label>
                        <input type="number" name="hp" required min="1" max="255" class="w-full p-4 rounded-xl border border-slate-700/50 bg-slate-800/50 text-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Ataque</label>
                        <input type="number" name="attack" required min="1" max="255" class="w-full p-4 rounded-xl border border-slate-700/50 bg-slate-800/50 text-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Defesa</label>
                        <input type="number" name="defense" required min="1" max="255" class="w-full p-4 rounded-xl border border-slate-700/50 bg-slate-800/50 text-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Atq. Especial</label>
                        <input type="number" name="special_attack" required min="1" max="255" class="w-full p-4 rounded-xl border border-slate-700/50 bg-slate-800/50 text-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Def. Especial</label>
                        <input type="number" name="special_defense" required min="1" max="255" class="w-full p-4 rounded-xl border border-slate-700/50 bg-slate-800/50 text-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Velocidade</label>
                        <input type="number" name="speed" required min="1" max="255" class="w-full p-4 rounded-xl border border-slate-700/50 bg-slate-800/50 text-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-200">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Imagem (opcional)
                    </label>
                    <input type="file" name="image" accept="image/*" class="w-full p-4 rounded-xl border border-slate-700/50 bg-slate-800/50 text-white file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:bg-emerald-500 file:text-slate-900 file:font-semibold file:cursor-pointer hover:file:bg-emerald-600 transition-all duration-200">
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 p-4 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 text-slate-900 font-bold text-lg hover:from-emerald-600 hover:to-teal-700 transform hover:-translate-y-1 transition-all duration-200 shadow-xl">
                        Criar Pokémon
                    </button>
                    <button type="button" @click="$store.modal.open = false" class="flex-1 p-4 rounded-xl border-2 border-slate-600/50 bg-slate-800/50 text-slate-300 hover:border-emerald-500 hover:bg-emerald-500/10 transition-all duration-200 font-semibold">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\Ramos\BackEnd\Aula 9\Pokemon\resources\views/components/pokemon-form.blade.php ENDPATH**/ ?>