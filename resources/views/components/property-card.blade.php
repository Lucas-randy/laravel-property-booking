<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ $property->image_url ?? 'https://via.placeholder.com/400x200' }}" alt="{{ $property->name }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="font-bold text-lg">{{ $property->name }}</h3>
        <p class="text-gray-600 mt-2">{{ Str::limit($property->description, 100) }}</p>
        <div class="mt-4 flex justify-between items-center">
            <span class="text-primary font-bold">{{ $property->price_per_night }} €/nuit</span>
            <x-button wire:click="bookProperty({{ $property->id }})">Réserver</x-button>
        </div>
    </div>
</div>