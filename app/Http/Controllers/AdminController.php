<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Affiche la page de connexion pour l'admin
    public function showLoginForm()
    {
        return view('admin.login'); // Assure-toi d'avoir une vue admin/login.blade.php
    }

    // Traite la connexion de l'admin
    public function login(Request $request)
    {
        // Validation des données de connexion
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion de l'admin avec le guard 'admin'
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Si la connexion réussit, redirige vers le dashboard de l'admin
            return redirect()->intended('/admin/dashboard');
        }

        // Si la connexion échoue, retourne à la page de login avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations d\'identification sont incorrectes.',
        ]);
    }

    // Affiche le dashboard de l'admin après une connexion réussie
    public function dashboard()
    {
        return view('admin.dashboard'); // Assure-toi d'avoir une vue admin/dashboard.blade.php
    }

    // Déconnexion de l'admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
