<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Supplier::class);

        $suppliers = Supplier::all();

        return view("suppliers.index", compact("suppliers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Supplier::class);

        return view("suppliers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Supplier::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Supplier::create([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('suppliers.index')->with('success', 'created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {

        Gate::authorize('view', $supplier);

        return view('suppliers.show', compact('supplier'));
    }

    public function showItems(Supplier $supplier)
    {
        Gate::authorize('view', $supplier);

        // Obtenez les items paginés pour ce lieu
        $items = $supplier->items()->paginate(5);

        // Chargez les relations nécessaires sur les items paginés
        $items->load('place', 'subplace', 'category', 'subcategory', 'department', 'agent', 'supplier');

        return view('suppliers.items', compact('supplier', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        Gate::authorize('update', $supplier);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $supplier->update($validatedData);

        return redirect(route('suppliers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        Gate::authorize('delete', $supplier);

        $supplier->delete();

        return redirect(route('suppliers.index'));
    }
}
