<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Découvrez nos propriétés') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Trouvez votre logement idéal</h3>
                <p class="text-gray-700 text-lg">Parcourez notre sélection de propriétés et réservez votre séjour dès maintenant.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($properties as $property)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transition-all duration-300 hover:shadow-md border border-gray-200">
                        <div class="h-48 bg-gray-200 relative">
                            @if(isset($property->image) && $property->image)
                                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute bottom-0 right-0 bg-primary text-white px-3 py-1 rounded-tl-md font-semibold">
                                {{ number_format($property->price_per_night, 2) }} € / nuit
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $property->name }}</h3>
                            <p class="text-gray-700 mb-4">{{ $property->description }}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('properties.show', $property) }}" class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 bg-primary hover:bg-primary/90 text-white">
                                    Voir détails
                                </a>
                                <span class="text-sm text-gray-700 font-medium">
                                    Disponible
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 bg-gray-50 rounded-lg border border-gray-200">
                        <p class="text-gray-700 text-lg font-medium">Aucune propriété disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>