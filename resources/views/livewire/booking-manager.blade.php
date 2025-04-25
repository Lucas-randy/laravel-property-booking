<div>
    @if($bookingSuccess)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Réservation confirmée!</strong>
            <p class="block sm:inline">Votre réservation a été effectuée avec succès.</p>
            <button wire:click="resetForm" class="mt-3 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Faire une autre réservation
            </button>
        </div>
    @else
        <form wire:submit.prevent="book" class="space-y-4">
            @if($errorMessage)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <p class="font-bold">{{ $errorMessage }}</p>
                </div>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Date d'arrivée</label>
                    <input 
                        type="date" 
                        id="start_date" 
                        wire:model="start_date" 
                        wire:change="calculatePrice"
                        class="w-full rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                        min="{{ date('Y-m-d') }}"
                    >
                    @error('start_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Date de départ</label>
                    <input 
                        type="date" 
                        id="end_date" 
                        wire:model="end_date" 
                        wire:change="calculatePrice"
                        class="w-full rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                        min="{{ $start_date ? date('Y-m-d', strtotime($start_date . ' +1 day')) : date('Y-m-d', strtotime('+1 day')) }}"
                    >
                    @error('end_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
            
            <div class="bg-gray-100 p-4 rounded-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-700">Prix par nuit:</span>
                    <span class="font-semibold">{{ number_format($property->price_per_night, 2) }} €</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-700">Nombre de nuits:</span>
                    <span class="font-semibold">{{ $nights }}</span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t border-gray-300">
                    <span class="text-gray-700 font-bold">Total:</span>
                    <span class="font-bold text-primary text-xl">{{ number_format($total_price, 2) }} €</span>
                </div>
            </div>
            
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="inline-flex items-center px-4 py-2 bg-primary hover:bg-primary/90 text-white font-semibold rounded-md"
                >
                    Réserver maintenant
                </button>
            </div>
        </form>
    @endif
</div>