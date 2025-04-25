@props([
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $variantClasses = [
        'primary' => 'bg-primary hover:bg-primary/90 text-white',
        'secondary' => 'bg-secondary hover:bg-secondary/90 text-white',
        'outline' => 'border border-gray-300 bg-white text-gray-700 hover:bg-gray-50',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    ][$variant];
@endphp

<button 
    type="{{ $type }}" 
    {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 ' . $variantClasses]) }}
>
    {{ $slot }}
</button>