<?php

namespace App\Http\Controllers;

use App\Models\Subplace;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Subplace::class);

        $subplaces = Subplace::with('place')->get();

        return view('subplaces.index', compact('subplaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Subplace::class);
        $places = Place::all();
        return view('subplaces.create', compact('places'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Gate::authorize('create', Subplace::class);

        $validatedData =  $request->validate([
            'name' => 'required|string|max:255',
            'place_id' => 'required|exists:places,id',
        ]);

        Subplace::create([
            'name' => $validatedData['name'],
            'place_id' => $validatedData['place_id'],

        ]);

        return redirect()->route('subplaces.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subplace $subplace)
    {
        Gate::authorize('view', $subplace);
        $subplace->load('place');
        $places = Place::all();
        return view('subplaces.show', compact('subplace','places'));
    }
    public function showItems(Subplace $subplace)
    {
        Gate::authorize('view', $subplace);

        // Obtenez les items paginés pour ce lieu
        $items = $subplace->items()->paginate(5);

        // Chargez les relations nécessaires sur les items paginés
        $items->load('place', 'subplace', 'category', 'subcategory', 'department', 'agent', 'supplier');

        return view('subplaces.items', compact('subplace', 'items'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subplace $subplace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subplace $subplace)
    {
        Gate::authorize('update', $subplace);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'place_id' => 'required|exists:places,id',

        ]);

        $subplace->update($validatedData);

        return redirect(route('subplaces.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subplace $subplace)
    {
        Gate::authorize('delete', $subplace);

        $subplace->delete();

        return redirect(route('subplaces.index'));
    }
}
