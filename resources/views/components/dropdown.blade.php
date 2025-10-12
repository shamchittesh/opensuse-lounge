@props([
    'label' => null,
    'name' => null,
    'value' => '',
    'placeholder' => 'Select an option',
    'required' => false,
    'error' => null,
    'helpText' => null,
    'options' => [], // Array of options: ['value' => 'label'] or ['value', 'value2']
])

<div class="space-y-1" x-data="{ open: false }" @click.away="open = false">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-primary">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            @if($required) required @endif
            {{ $attributes->merge(
                ['class' =>
                    'bg-card block w-full px-4 py-2 pr-10 border rounded-lg shadow-sm transition-colors duration-200 focus:ring-2 focus:ring-accent focus:border-accent appearance-none cursor-pointer '
                    . ($error ? 'border-danger focus:ring-danger focus:border-danger' : 'border-default')
                    . ' text-primary'
                ])
            }}
        >
            @if($placeholder)
                <option value="" disabled {{ old($name, $value) === '' ? 'selected' : '' }}>
                    {{ $placeholder }}
                </option>
            @endif

            @foreach($options as $optionValue => $optionLabel)
                @php
                    // Handle both associative and indexed arrays
                    $val = is_numeric($optionValue) ? $optionLabel : $optionValue;
                    $label = is_numeric($optionValue) ? $optionLabel : $optionLabel;
                @endphp
                <option
                    value="{{ $val }}"
                    {{ old($name, $value) == $val ? 'selected' : '' }}
                >
                    {{ $label }}
                </option>
            @endforeach

            {{ $slot }}
        </select>

        <!-- Dropdown arrow icon -->
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-muted">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </div>
    </div>

    @if($helpText)
        <p class="text-sm text-muted">{{ $helpText }}</p>
    @endif

    @if($error)
        <p class="text-sm text-danger">{{ $error }}</p>
    @endif

    @error($name)
        <p class="text-sm text-danger">{{ $message }}</p>
    @enderror
</div>
