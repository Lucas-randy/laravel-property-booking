<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Assurez-vous qu'il n'y a PAS de constructeur qui applique le middleware auth
    // public function __construct()
    // {
    //     $this->middleware('auth'); // CECI CAUSERAIT LE PROBLÈME
    // }

    /**
     * Display a listing of the properties.
     */
    public function index()
    {
        $properties = Property::latest()->get();
        
        return view('welcome', compact('properties'));
    }

    /**
     * Display the specified property.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}