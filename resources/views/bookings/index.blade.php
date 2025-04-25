<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Réservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <p class="font-bold">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <p class="font-bold">{{ session('error') }}</p>
                        </div>
                    @endif

                    <h3 class="text-lg font-semibold mb-4">Vos réservations</h3>

                    @if($bookings->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Propriété
                                        </th>
                                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Date d'arrivée
                                        </th>
                                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Date de départ
                                        </th>
                                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Prix total
                                        </th>
                                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td class="py-4 px-4 border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $booking->property->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 border-b border-gray-200">
                                                <div class="text-sm text-gray-900">{{ $booking->start_date->format('d/m/Y') }}</div>
                                            </td>
                                            <td class="py-4 px-4 border-b border-gray-200">
                                                <div class="text-sm text-gray-900">{{ $booking->end_date->format('d/m/Y') }}</div>
                                            </td>
                                            <td class="py-4 px-4 border-b border-gray-200">
                                                <div class="text-sm text-gray-900">
                                                    {{ number_format($booking->property->price_per_night * $booking->start_date->diffInDays($booking->end_date), 2) }} €
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 border-b border-gray-200 text-sm">
                                                <a href="{{ route('properties.show', $booking->property) }}" class="text-primary hover:underline mr-3">
                                                    Voir la propriété
                                                </a>
                                                
                                                <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation?')">
                                                        Annuler
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-md p-6 text-center">
                            <p class="text-gray-600">Vous n'avez pas encore de réservations.</p>
                            <a href="{{ route('welcome') }}" class="mt-4 inline-block text-primary hover:underline">
                                Parcourir les propriétés disponibles
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>