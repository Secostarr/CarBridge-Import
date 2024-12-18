<?php

namespace App\Providers;

use App\Models\about;
use App\Models\Home;
use App\Models\Testimonial;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Ambil data pertama dari tabel 'home'
         $home = Home::first();
         $about = about::first();
        
         // Bagikan data ke semua tampilan
         View::share('home', $home);
         View::share('about', $about);
    }
}
