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
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRole;

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
    ->only(['index', 'store','create','edit', 'update',"show"])
    ->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
Route::delete('places/{place}', [PlaceController::class, 'destroy'])
    ->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin'])
    ->name('places.destroy');

Route::get('/places/{place}/subplaces', [PlaceController::class, 'showSubplaces'])->name('places.subplaces')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
Route::get('/places/{place}/items', [PlaceController::class, 'showItems'])->name('places.items')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);



Route::resource('subplaces', SubplaceController::class)
    ->only(['index', 'store','create','edit', 'update', "show"])
    ->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
Route::delete('subplaces/{subplace}',[SubplaceController::class, 'destroy'])->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin'])->name('subplaces.destroy');
Route::get('/subplaces/{subplace}/items', [SubplaceController::class, 'showItems'])->name('subplaces.items')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);



Route::resource('categories', CategoryController::class)
    ->only(['index', 'store','create','edit', 'update', "show"])
    ->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
    Route::delete('categories/{category}',[CategoryController::class, 'destroy'])->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin'])->name('categories.destroy');
Route::get('/categories/{category}/subcategories', [CategoryController::class, 'showSubcategories'])->name('categories.subcategories')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
Route::get('/categories/{category}/items', [CategoryController::class, 'showItems'])->name('categories.items')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);



Route::resource('subcategories', SubcategoryController::class)
    ->only(['index', 'store','create','edit', 'update',"show"])
    ->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
    Route::delete('subcategories/{subcategory}',[SubcategoryController::class, 'destroy'])->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin'])->name('subcategories.destroy');
Route::get('/subcategories/{subcategory}/items', [SubcategoryController::class, 'showItems'])->name('subcategories.items')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);






Route::resource('departments', DepartmentController::class)
    ->only(['index', 'store','create','edit', 'update', "show"])
    ->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
Route::delete('departments/{department}',[DepartmentController::class, 'destroy'])->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin'])->name('departments.destroy');
Route::get('/departments/{department}/agents', [DepartmentController::class, 'showAgents'])->name('departments.agents')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
Route::get('/departments/{department}/items', [DepartmentController::class, 'showItems'])->name('departments.items')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);




Route::resource('agents', AgentController::class)
    ->only(['index', 'store','create','edit', 'update',"show"])
    ->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);
Route::delete('agents/{agent}',[AgentController::class, 'destroy'])->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin'])->name('agents.destroy');
Route::get('/agents/{agent}/items', [AgentController::class, 'showItems'])->name('agents.items')->middleware(['auth', 'verified',CheckUserRole::class.':admin,super_admin,basic']);





Route::resource('suppliers', SupplierController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);
Route::get('/suppliers/{supplier}/items', [SupplierController::class, 'showItems'])->name('suppliers.items')->middleware(['auth', 'verified']);

Route::resource('items', ItemController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);
// Routes spécifiques pour les requêtes AJAX
Route::get('/api/places/{id}/subplaces', [ItemController::class, 'getSubplaces'])->middleware(['auth', 'verified']);
Route::get('/api/categories/{id}/subcategories', [ItemController::class, 'getSubcategories'])->name('api.categories.subcategories')->middleware(['auth', 'verified']);
Route::get('/api/departments/{id}/agents', [ItemController::class, 'getAgents'])->name('api.departments.agents')->middleware(['auth', 'verified']);

Route::get('/export', [ItemController::class, 'itemExport'])->name('export')->middleware(['auth', 'verified']);

Route::resource('users', UserController::class)
    ->only(['index', 'store','create','edit', 'update', 'destroy', "show"])
    ->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
