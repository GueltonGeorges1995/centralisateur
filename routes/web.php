<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SubplaceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('places', PlaceController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);
Route::get('/places/{place}/subplaces', [PlaceController::class, 'showSubplaces'])->name('places.subplaces')->middleware(['auth', 'verified']);
Route::get('/places/{place}/items', [PlaceController::class, 'showItems'])->name('places.items')->middleware(['auth', 'verified']);

Route::resource('subplaces', SubplaceController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);  
Route::get('/subplaces/{subplace}/items', [SubplaceController::class, 'showItems'])->name('subplaces.items')->middleware(['auth', 'verified']);

Route::resource('categories', CategoryController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);
Route::get('/categories/{category}/subcategories', [CategoryController::class, 'showSubcategories'])->name('categories.subcategories')->middleware(['auth', 'verified']);
Route::get('/categories/{category}/items', [CategoryController::class, 'showItems'])->name('categories.items')->middleware(['auth', 'verified']);

Route::resource('subcategories', SubcategoryController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);
Route::get('/subcategories/{subcategory}/items', [SubcategoryController::class, 'showItems'])->name('subcategories.items')->middleware(['auth', 'verified']);

Route::resource('departments', DepartmentController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);
Route::get('/departments/{department}/agents', [DepartmentController::class, 'showAgents'])->name('departments.agents');

Route::resource('agents', AgentController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);

Route::resource('suppliers', SupplierController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);

Route::resource('items', ItemController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);
// Routes spécifiques pour les requêtes AJAX
Route::get('/api/places/{id}/subplaces', [ItemController::class, 'getSubplaces']);
Route::get('/api/categories/{id}/subcategories', [ItemController::class, 'getSubcategories'])->name('api.categories.subcategories');
Route::get('/api/departments/{id}/agents', [ItemController::class, 'getAgents'])->name('api.departments.agents');

require __DIR__.'/auth.php';
