@props(['label', 'name', 'type' => 'text', 'placeholder' => '', 'required' => false, 'icon' => null, 'mask' => null, 'step' => null, 'value' => null])

<div class="mb-6 group">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2 transition-colors group-focus-within:text-blue-600">
        {{ $label }}
        @if($required)
            <span class="text-red-500 ml-1">*</span>
        @endif
    </label>

    <div class="relative">
        @if($icon)
            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-500 z-10">
                {!! $icon !!}
            </div>
        @endif

        @if($type === 'textarea')
            <textarea
                id="{{ $name }}"
                name="{{ $name }}"
                {{ $placeholder ? "placeholder=\"$placeholder\"" : '' }}
                {{ $required ? 'required' : '' }}
                class="w-full px-4 py-3 {{ $icon ? 'pl-12' : '' }} border-2 border-gray-200 rounded-xl bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition-all duration-200 text-gray-900 placeholder-transparent resize-none shadow-sm hover:border-gray-300 hover:shadow-md"
                rows="4"
            >{{ old($name, $value) }}</textarea>
        @else
            <input
                type="{{ $type }}"
                id="{{ $name }}"
                name="{{ $name }}"
                value="{{ old($name, $value) }}"
                {{ $placeholder ? "placeholder=\"$placeholder\"" : '' }}
                {{ $required ? 'required' : '' }}
                {{ $step ? "step=\"$step\"" : '' }}
                {{ $mask ? "data-mask=\"$mask\"" : '' }}
                {{ $mask === 'currency' ? 'data-currency="true"' : '' }}
                class="w-full px-4 py-3 {{ $icon ? 'pl-12' : '' }} border-2 border-gray-200 rounded-xl bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition-all duration-200 text-gray-900 placeholder-transparent shadow-sm hover:border-gray-300 hover:shadow-md"
            />
        @endif

        @if($mask === 'currency')
            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">
                R$
            </div>
        @endif
    </div>

    @error($name)
        <div class="mt-2 flex items-center text-red-600 text-sm animate-pulse">
            <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
            </svg>
            {{ $message }}
        </div>
    @enderror
</div>
