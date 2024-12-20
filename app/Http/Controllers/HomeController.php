<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $testimoi = Testimonial::orderby('id_testimonial')->take(3)->get();
        $contact = contact::first();

        if ($testimoi->isEmpty()) {
            // Jika tidak ada data
            // Anda bisa memberikan nilai default atau penanganan error di sini
            $firstTestimoni = null;
            $secondTestimoni = null;
            $thirdTestimoni = null;
        } else {
            $firstTestimoni = $testimoi[0];  // ID pertama
            $secondTestimoni = $testimoi[1]; // ID kedua
            $thirdTestimoni = $testimoi[2];  // ID ketiga
        }

        return view('frontend.home', compact('firstTestimoni', 'secondTestimoni', 'thirdTestimoni', 'contact'));    
    }

    public function seeAll()
    {
        return view('frontend.seeAll');   
    }

    public function detail()
    {
        return view('frontend.detail');   
    }

    public function testimoni()
    {
        return view('frontend.testimonial');
    }
}
