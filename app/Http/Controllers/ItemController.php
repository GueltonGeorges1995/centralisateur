<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Department;
use App\Models\Item;
use App\Models\Place;
use App\Models\Subcategory;
use App\Models\Subplace;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('place','subplace','category','subcategory','department','agent','supplier')->get();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $places = Place::all();
        $subplaces = Subplace::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $departments = Department::all();
        $agents = Agent::all();
        $suppliers = Supplier::all();

        return view('items.create', compact('places','subplaces','categories','subcategories','departments','agents','suppliers',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'SN' => 'required|string|max:255',
            'BOS' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'place_id' => 'required|exists:places,id',
            'subplace_id' => 'required|exists:subplaces,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'department_id' => 'required|exists:departments,id',
            'agent_id' => 'required|exists:agents,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Item::create($validatedData);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function getSubplaces($placeId)
    {
        try {
            $subplaces = Subplace::where('place_id', $placeId)->get();
            return response()->json($subplaces);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch subplaces'], 500);
        }
    }

    public function getSubcategories($categoryId)
    {
        try {
            $subcategories = Subcategory::where('category_id', $categoryId)->get();
            return response()->json($subcategories);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch subcategories'], 500);
        }
    }
    public function getAgents($departmentId)
    {
        try {
            $agents = Agent::where('department_id', $departmentId)->get();
            return response()->json($agents);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch agents'], 500);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $item->load('place','subplace','category','subcategory','department','agent','supplier');
       
        return view('items.show', compact('item'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $places = Place::all();
        $subplaces = Subplace::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $departments = Department::all();
        $agents = Agent::all();
        $suppliers = Supplier::all();

        $item->load('place','subplace','category','subcategory','department','agent','supplier');

        return view('items.edit', compact('places','subplaces','categories','subcategories','departments','agents','suppliers','item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'SN' => 'required|string|max:255',
        'BOS' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'place_id' => 'required|exists:places,id',
        'subplace_id' => 'required|exists:subplaces,id',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:subcategories,id',
        'department_id' => 'required|exists:departments,id',
        'agent_id' => 'required|exists:agents,id',
        'supplier_id' => 'required|exists:suppliers,id',
    ]);

    $item->update($validatedData);

    return redirect()->route('items.show', $item->id);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect(route('items.index'));
    }
}
