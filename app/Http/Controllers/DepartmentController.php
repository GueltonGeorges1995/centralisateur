<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Department::class);
        $departments = Department::with('agents')->get();

        return view("departments.index", compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Department::class);

        return view("departments.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Department::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Department::create([
            'name' => $validatedData['name'],

        ]);

        return redirect()->route('departments.index')->with('success', 'Places created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        Gate::authorize('view', $department);

        $department->load('agents');

        return view('departments.show', compact('department'));
    }
    public function showAgents(Department $department)
    {
        Gate::authorize('view', $department);

        $department->load('agents'); // Charge les subplaces associées

        return view('departments.agents', compact('department'));
    }

    public function showItems(Department $department)
    {
        Gate::authorize('view', $department);

        // Obtenez les items paginés pour ce lieu
        $items = $department->items()->paginate(5);

        // Chargez les relations nécessaires sur les items paginés
        $items->load('place', 'subplace', 'category', 'subcategory', 'department', 'agent', 'supplier');

        return view('departments.items', compact('department', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        Gate::authorize('update', $department);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department->update($validatedData);

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        Gate::authorize('delete', $department);

        $department->delete();

        return redirect(route('departments.index'));
    }
}
