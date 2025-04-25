<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingManager extends Component
{
    public Property $property;
    public $start_date;
    public $end_date;
    public $total_price = 0;
    public $nights = 0;
    public $bookingSuccess = false;
    public $errorMessage = '';

    protected $rules = [
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ];

    protected $messages = [
        'start_date.required' => 'La date d\'arrivée est obligatoire.',
        'start_date.date' => 'La date d\'arrivée doit être une date valide.',
        'start_date.after_or_equal' => 'La date d\'arrivée doit être aujourd\'hui ou une date ultérieure.',
        'end_date.required' => 'La date de départ est obligatoire.',
        'end_date.date' => 'La date de départ doit être une date valide.',
        'end_date.after' => 'La date de départ doit être après la date d\'arrivée.',
    ];

    public function mount(Property $property)
    {
        $this->property = $property;
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->addDays(1)->format('Y-m-d');
        $this->calculatePrice();
    }

    public function updatedStartDate()
    {
        $this->validateOnly('start_date');

        // Si la date de fin est avant la date de début, on l'ajuste
        if ($this->end_date && Carbon::parse($this->end_date)->lte(Carbon::parse($this->start_date))) {
            $this->end_date = Carbon::parse($this->start_date)->addDay()->format('Y-m-d');
        }

        $this->calculatePrice();
    }

    public function updatedEndDate()
    {
        $this->validateOnly('end_date');
        $this->calculatePrice();
    }

    public function calculatePrice()
    {
        if ($this->start_date && $this->end_date) {
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);

            if ($end->gt($start)) {
                $this->nights = $end->diffInDays($start);
                $this->total_price = $this->nights * $this->property->price_per_night;
            }
        }
    }

    public function checkAvailability()
    {
        $this->validate();

        // Vérifier si la propriété est déjà réservée pour ces dates
        $conflictingBookings = Booking::where('property_id', $this->property->id)
            ->where(function ($query) {
                $query->whereBetween('start_date', [$this->start_date, $this->end_date])
                    ->orWhereBetween('end_date', [$this->start_date, $this->end_date])
                    ->orWhere(function ($query) {
                        $query->where('start_date', '<=', $this->start_date)
                            ->where('end_date', '>=', $this->end_date);
                    });
            })
            ->count();

        if ($conflictingBookings > 0) {
            $this->errorMessage = 'Cette propriété n\'est pas disponible pour les dates sélectionnées.';
            return false;
        }

        return true;
    }

    public function book()
    {
        if (!$this->checkAvailability()) {
            return;
        }

        try {
            Booking::create([
                'user_id' => Auth::id(),
                'property_id' => $this->property->id,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ]);

            $this->bookingSuccess = true;
            $this->errorMessage = '';

            $this->dispatch('booking-created');

            session()->flash('success', 'Votre réservation a été effectuée avec succès!');
        } catch (\Exception $e) {
            $this->errorMessage = 'Une erreur est survenue lors de la réservation. Veuillez réessayer.';
        }
    }

    public function resetForm()
    {
        $this->bookingSuccess = false;
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->addDays(1)->format('Y-m-d');
        $this->calculatePrice();
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
