<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('category')->inRandomOrder()->get();

        return view('frontend.property', compact('properties'));
    }

    public function show(Property $property)
    {
        return view('frontend.detail', compact('property'));
    }
}
