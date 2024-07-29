<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Category::class);
        $categories = Category::with('subcategories')->get();


        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Category::class);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Category::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('categories.index')->with('success', 'Places created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        Gate::authorize('view', $category);

        $category->load('subcategories');

        return view('categories.show', compact('category'));
    }

    public function showSubcategories(Category $category)
    {
        Gate::authorize('view', $category);

        $category->load('subcategories'); // Charge les subplaces associées

        return view('categories.subcategories', compact('category'));
    }

    public function showItems(Category $category)
    {
        Gate::authorize('view', $category);

        // Obtenez les items paginés pour ce lieu
        $items = $category->items()->paginate(5);

        // Chargez les relations nécessaires sur les items paginés
        $items->load('place', 'subplace', 'category', 'subcategory', 'department', 'agent', 'supplier');

        return view('categories.items', compact('category', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        Gate::authorize('update', $category);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validatedData);

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('delete', $category);

        $category->delete();

        return redirect(route('categories.index'));
    }
}
