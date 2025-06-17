<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MyListingsController;
use App\Http\Controllers\ProfileController;

// Homepage
Route::get('/', [CarController::class, 'home'])->name('home');

// Public: View listings
Route::get('/sludinajumi', [CarController::class, 'index'])->name('cars.index');

// Authenticated-only routes
Route::middleware(['auth'])->group(function () {

    // Add car
    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

    // Edit/update car
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');

    // Delete car
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

    // Dashboard redirect
    Route::get('/dashboard', fn () => redirect()->route('home'))->name('dashboard');

    // Profile routes
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // My listings
    Route::get('/my-listings', [MyListingsController::class, 'index'])->name('my.listings');
});

// Laravel Breeze Auth routes
require __DIR__.'/auth.php';
