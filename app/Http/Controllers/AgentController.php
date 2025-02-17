<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    Gate::authorize('viewAny', Agent::class);

    $search = $request->input('search');

    // Requête de recherche
    $agents = Agent::with('department')
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('ext', 'like', "%{$search}%")
                  ->orWhere('mail', 'like', "%{$search}%")
                  ->orWhereHas('department', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        })
        ->paginate(5);



    return view('agents.index', compact('agents'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Agent::class);

        $departments = Department::all();
        return view('agents.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Agent::class);

        $validatedData =  $request->validate([
            'name' => 'required|string|max:255',
            'mail' => 'required|string|max:255',
            'ext' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Agent::create([
            'name' => $validatedData['name'],
            'mail' => $validatedData['mail'],
            'ext' => $validatedData['ext'],
            'department_id' => $validatedData['department_id'],

        ]);

        return redirect()->route('agents.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        Gate::authorize('view', $agent);

        $agent->load('department');
        $departments = Department::all();
        return view('agents.show', compact('agent','departments'));
    }

    public function showItems(Agent $agent)
    {
        Gate::authorize('view', $agent);

        // Obtenez les items paginés pour ce lieu
        $items = $agent->items()->paginate(5);

        // Chargez les relations nécessaires sur les items paginés
        $items->load('place', 'subplace', 'category', 'subcategory', 'department', 'agent', 'supplier');

        return view('agents.items', compact('agent', 'items'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        Gate::authorize('update', $agent);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'ext' => 'required|string|max:255',
            'mail' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $agent->update($validatedData);

        return redirect(route('agents.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        Gate::authorize('delete', $agent);

        $agent->delete();

        return redirect(route('agents.index'));
    }
}
