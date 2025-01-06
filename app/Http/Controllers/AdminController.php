<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\contact;
use App\Models\Home;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function home()
    {
        $home = Home::first();
        return view('backend.home', compact('home'));
    }

    public function about()
    {
        $about = about::first();
        return view('backend.about', compact('about'));
    }

    public function testi()
    {
        $testi = Testimonial::take(3)->get();
        return view('backend.testimonial', compact('testi'));
    }

    public function contact()
    {
        $contact = contact::first();
        return view('backend.contact', compact('contact'));
    }
}
