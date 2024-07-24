<?php

namespace App\Http\Controllers;

use App\Models\Subplace;
use App\Models\Place;
use Illuminate\Http\Request;

class SubplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subplaces = Subplace::with('place')->get();

        return view('subplaces.index', compact('subplaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $places = Place::all();
        return view('subplaces.create', compact('places'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        $subplace->load('place');
        $places = Place::all();
        return view('subplaces.show', compact('subplace','places'));
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
        $subplace->delete();

        return redirect(route('subplaces.index'));
    }
}
