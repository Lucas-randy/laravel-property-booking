@props(['disabled' => false, 'error' => ''])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50' . ($error ? ' border-red-500' : '')]) !!}>

@if($error)
    <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
@endif