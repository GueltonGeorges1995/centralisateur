<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Department;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::with('department')->get();

        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('agents.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $agent->load('department');
        $departments = Department::all();
        return view('agents.show', compact('agent','departments'));
    }

    public function showItems(Agent $agent)
    {
        $agent->load('items');

        return view('agents.items', compact('agent'));
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
        $agent->delete();

        return redirect(route('agents.index'));
    }
}
