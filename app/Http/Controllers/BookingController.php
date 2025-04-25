<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the user's bookings.
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()->with('property')->latest()->get();
        
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Cancel a booking.
     */
    public function destroy(Booking $booking)
    {
        // Vérifier que l'utilisateur est bien le propriétaire de la réservation
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('bookings.index')->with('error', 'Vous n\'êtes pas autorisé à annuler cette réservation.');
        }
        
        $booking->delete();
        
        return redirect()->route('bookings.index')->with('success', 'Votre réservation a été annulée avec succès.');
    }
}