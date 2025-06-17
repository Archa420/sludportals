<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class MyListingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cars = Car::where('user_id', $user->id)->latest()->get();

        return view('my-listings', compact('cars'));
    }
}
