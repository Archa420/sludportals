<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MyListingsController;

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
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    // Profile view (fixed: pass $user)
    Route::get('/profile', function () {
        return view('profile', ['user' => auth()->user()]);
    })->name('profile');

    // Profile update
    Route::put('/profile', function (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $user = auth()->user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('profile')->with('success', 'Profils atjaunināts!');
    })->name('profile.update');

    // My listings
    Route::get('/my-listings', [MyListingsController::class, 'index'])->name('my.listings');
});

// Laravel Breeze (or Jetstream) Auth routes
require __DIR__.'/auth.php';
