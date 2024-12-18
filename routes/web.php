<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/carbridge', [HomeController::class, 'home'])->name('home');
Route::get('/carbridge/item/seeAll', [HomeController::class, 'seeAll'])->name('seeAll');
Route::get('/carbridge/item/detail', [HomeController::class, 'detail'])->name('detail');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
