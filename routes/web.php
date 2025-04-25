<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;

// Page d'accueil avec la liste des propriétés - ACCESSIBLE SANS AUTHENTIFICATION
Route::get('/', [PropertyController::class, 'index'])->name('welcome');

// Détail d'une propriété - ACCESSIBLE SANS AUTHENTIFICATION
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Dashboard de l'admin (après connexion réussie)
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Routes pour les réservations
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes d'authentification admin
//Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
//Route::post('admin/login', [AdminController::class, 'login']);

// Ce fichier d'authentification est géré par Laravel
require __DIR__ . '/auth.php';
