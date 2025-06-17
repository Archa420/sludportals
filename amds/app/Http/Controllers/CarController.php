<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // ✅ Import trait

class CarController extends Controller
{
    use AuthorizesRequests; // ✅ Include the trait

    public function home()
    {
        $cars = Car::latest()->take(4)->get();
        return view('home', compact('cars'));
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $cars = Car::query()
            ->when($search, fn($query) => $query->where('title', 'like', "%{$search}%"))
            ->latest()
            ->get();

        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $data['user_id'] = Auth::id();

        Car::create($data);

        return redirect()->route('cars.index')->with('success', 'Sludinājums pievienots!');
    }

    public function edit(Car $car)
    {
        $this->authorize('update', $car); // ✅ Authorization check

        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $this->authorize('update', $car); // ✅ Authorization check

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($data);

        return redirect()->route('cars.index')->with('success', 'Sludinājums atjaunināts!');
    }

    public function destroy(Car $car)
    {
        $this->authorize('delete', $car); // ✅ Authorization check

        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Sludinājums dzēsts!');
    }
}
