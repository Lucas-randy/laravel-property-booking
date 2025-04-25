<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $property->name }}
            </h2>
            <a href="{{ route('welcome') }}" class="text-primary hover:underline">
                &larr; Retour aux propriétés
            </a>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <div class="h-80 bg-gray-200 rounded-lg mb-4">
                        @if(isset($property->image) && $property->image)
                        <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}" class="w-full h-full object-cover rounded-lg">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200 rounded-lg">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                    <div class="prose max-w-none">
                        <h3 class="text-2xl font-bold mb-4">Description</h3>
                        <p>{{ $property->description }}</p>
                    </div>
                </div>

                <div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-sm mb-6">
                        <h3 class="text-xl font-semibold mb-4">Détails de la propriété</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-500">Prix par nuit</p>
                                <p class="font-semibold text-xl text-primary">{{ number_format($property->price_per_night, 2) }} €</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center py-4">
                        <p class="mb-4 text-gray-600">Connectez-vous pour réserver cette propriété</p>
                        <div class="flex space-x-4 justify-center">
                            <!-- Bouton Se connecter -->
                            <a href="{{ route('login', ['redirect' => request()->fullUrl()]) }}"
                                class="bg-gray-200 hover:bg-gray-300 text-black font-semibold py-2 px-4 rounded shadow">
                                Se connecter
                            </a>

                            <!-- Bouton S'inscrire -->
                            <a href="{{ route('register') }}"
                                class="bg-white border border-blue-600 text-blue-600 hover:bg-blue-50 font-semibold py-2 px-4 rounded shadow">
                                S'inscrire
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>