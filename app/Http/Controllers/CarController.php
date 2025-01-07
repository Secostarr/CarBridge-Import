<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function cars()
    {
        $car = car::all();
        return view('backend.cars', compact('car'));
    }
}
