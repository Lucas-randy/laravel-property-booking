<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Navigation -->
            <nav class="bg-primary p-4 text-white shadow-md">
                <div class="container mx-auto flex justify-between items-center">
                    <a href="{{ route('welcome') }}" class="text-xl font-bold text-white">Réservations Immobilières</a>
                    <div class="space-x-4">
                        @auth
                            <a href="{{ route('bookings.index') }}" class="text-white hover:underline">Mes Réservations</a>
                            <a href="{{ route('dashboard') }}" class="text-white hover:underline">Tableau de bord</a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-white hover:underline">Déconnexion</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:underline">Connexion</a>
                            <a href="{{ route('register') }}" class="text-white hover:underline">Inscription</a>
                        @endauth
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 mb-4 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white shadow mt-auto py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-700 font-medium">
                            &copy; {{ date('Y') }} Gestion de Réservations Immobilières
                        </div>
                        <div class="text-sm text-gray-700 font-medium">
                            Propulsé par Laravel
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        @livewireScripts
    </body>
</html>