<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Subcategory::class);
        $subcategories = Subcategory::with('category')->get();

        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Subcategory::class);

        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Subcategory::class);

        $validatedData =  $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Subcategory::create([
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],

        ]);

        return redirect()->route('subcategories.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        Gate::authorize('view', $subcategory);

        $subcategory->load('category');
        $categories = Category::all();
        return view('subcategories.show', compact('subcategory','categories'));
    }

    public function showItems(Subcategory $subcategory)
    {
        Gate::authorize('view', $subcategory);

        // Obtenez les items paginés pour ce lieu
        $items = $subcategory->items()->paginate(5);

        // Chargez les relations nécessaires sur les items paginés
        $items->load('place', 'subplace', 'category', 'subcategory', 'department', 'agent', 'supplier');

        return view('subcategories.items', compact('subcategory', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        Gate::authorize('update', $subcategory);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',

        ]);

        $subcategory->update($validatedData);

        return redirect(route('subcategories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        Gate::authorize('delete', $subcategory);

        $subcategory->delete();

        return redirect(route('subcategories.index'));
    }
}
