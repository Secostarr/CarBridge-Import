<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/carbridge', [HomeController::class, 'home'])->name('home');
Route::get('/carbridge/seeTestimoni', [HomeController::class, 'testimoni'])->name('testimoni');
Route::get('/carbridge/seeAll', [HomeController::class, 'seeAll'])->name('seeAll');

Route::get('/getCarsByMerek/{merek}', [HomeController::class, 'getCarsByMerek'])->name('frontend.getCarsByMerek');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('backend.dashboard');

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [UserLoginController::class, 'login'])->name('login');
    Route::post('/admin/login/auth', [UserLoginController::class, 'auth'])->name('auth');
});
Route::get('/carbridge/item/detail', [HomeController::class, 'detail'])->name('detail');


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/dashboard/home', [AdminController::class, 'home'])->name('admin.dashboard.home');
Route::get('/admin/dashboard/about', [AdminController::class, 'about'])->name('admin.dashboard.about');
Route::get('/admin/dashboard/testi', [AdminController::class, 'testi'])->name('admin.dashboard.testi');
Route::get('/admin/dashboard/contact', [AdminController::class, 'contact'])->name('admin.dashboard.contact');

Route::get('/admin/dashboard/cars', [CarController::class, 'cars'])->name('admin.dashboard.cars');