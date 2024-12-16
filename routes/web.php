<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/carbridge', [HomeController::class, 'home'])->name('home ');