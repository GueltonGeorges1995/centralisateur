<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View 
    {
        $places = Place::with('subplaces')->get();
       

         return view('places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View 
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        Place::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            
        ]);

        return redirect()->route('places.index')->with('success', 'Places created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        // return view('places.show');
        // $place = Place::with('subplaces')->findOrFail($place->id);
        $place->load('subplaces');

        return view('places.show', compact('place'));
    }

    public function showSubplaces(Place $place)
    {
        $place->load('subplaces'); // Charge les subplaces associées

        return view('places.subplaces', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $place->update($validatedData);

        return redirect(route('places.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return redirect(route('places.index'));
    }
}
