<?php

namespace App\Http\Controllers;

use App\Models\car;
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
        $mereks = car::select('merek')->distinct()->get();
        return view('frontend.seeAll', compact('mereks'));
    }

    public function getCarsByMerek($merek)
    {
        $cars = car::where('merek', $merek)->get();
        return response()->json($cars);
    }

    public function detail()
    {
        return view('frontend.detail');
    }

    public function testimoni()
    {
        // Ambil data mobil yang sudah terjual dan urutkan berdasarkan tanggal terbaru
        $mobilTerjual = car::where('status', 'sold') // Pastikan kolom 'status' ada dan mencatat status mobil
            ->orderBy('updated_at', 'desc') // Asumsi ada kolom 'tanggal_terjual'
            ->take(4) // Batasi hanya 4 item
            ->get();

        // Kirim data ke view
        return view('frontend.testimonial', compact('mobilTerjual'));
    }
}
