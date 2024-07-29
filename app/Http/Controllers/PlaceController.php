<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        Gate::authorize('viewAny', Place::class);



        $places = Place::with('subplaces')->get();

         return view('places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        Gate::authorize('create', Place::class);
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Place::class);

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
        Gate::authorize('view', $place);

        $place->load('subplaces');

        return view('places.show', compact('place'));
    }

    public function showSubplaces(Place $place)
    {
        Gate::authorize('view', $place);

        $place->load('subplaces');

        return view('places.subplaces', compact('place'));
    }

    public function showItems(Place $place)
    {
        Gate::authorize('view', $place);

        // Obtenez les items paginés pour ce lieu
        $items = $place->items()->paginate(5);

        // Chargez les relations nécessaires sur les items paginés
        $items->load('place', 'subplace', 'category', 'subcategory', 'department', 'agent', 'supplier');

        return view('places.items', compact('place', 'items'));
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
        Gate::authorize('update', $place);

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
        Gate::authorize('delete', $place);

        $place->delete();

        return redirect(route('places.index'));
    }
}
