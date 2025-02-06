<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/carbridge', [HomeController::class, 'home'])->name('home');
Route::get('/carbridge/seeTestimoni', [HomeController::class, 'testimoni'])->name('testimoni');
Route::get('/carbridge/seeAll', [HomeController::class, 'seeAll'])->name('seeAll');
Route::get('/carbridge/item/detail/{id_cars}', [HomeController::class, 'detail'])->name('detail');

Route::get('/getCarsByMerek/{merek}', [HomeController::class, 'getCarsByMerek']);

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [UserLoginController::class, 'login'])->name('login');
    Route::post('/admin/login/auth', [UserLoginController::class, 'auth'])->name('admin.auth');
});

Route::middleware(['auth'])->group(function () {
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::put('admin/profile/update', [AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/logout', [UserLoginController::class, 'logout'])->name('admin.logout');  

Route::get('/admin/dashboard/home', [AdminController::class, 'home'])->name('admin.dashboard.home');
Route::post('/admin/home', [HomeController::class, 'store'])->name('admin.home.store');
Route::put('/admin/home/{id}', [HomeController::class, 'update'])->name('admin.home.update');

Route::get('/admin/dashboard/about', [AdminController::class, 'about'])->name('admin.dashboard.about');
Route::post('admin/dashboard/about/store', [AboutController::class, 'store'])->name('backend.about.store');
Route::put('admin/dashboard/about/update/{id_about}', [AboutController::class, 'update'])->name('admin.about.update');

Route::get('/admin/dashboard/testimonial', [AdminController::class, 'testi'])->name('admin.dashboard.testi');
Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('backend.testimonial.store');
Route::put('testimonial/edit/{id_testimonial}', [TestimonialController::class, 'update'])->name('backend.testimonial.update');

Route::get('/admin/dashboard/contact', [AdminController::class, 'contact'])->name('admin.dashboard.contact');
Route::post('contact/store', [ContactController::class, 'store'])->name('backend.contact.store');
Route::put('contact/edit/{id_contact}', [ContactController::class, 'update'])->name('backend.contact.update');

Route::get('/admin/dashboard/cars', [CarController::class, 'cars'])->name('admin.dashboard.cars');
Route::post('admin/dashboard/cars/store', [CarController::class, 'store'])->name('backend.cars.store');
Route::put('admin/dashboard/cars/update/{id_cars}', [CarController::class, 'update'])->name('backend.cars.update');
Route::delete('admin/dashboard/cars/delete/{id_cars}', [CarController::class, 'delete'])->name('backend.cars.delete');

Route::get('/api/car-status', function () {
    $carCounts = DB::table('cars')
        ->select('merek', DB::raw('COUNT(*) as count'))
        ->where('status', 'for_sale')
        ->groupBy('merek')
        ->pluck('count', 'merek');

    return response()->json($carCounts);
});
});