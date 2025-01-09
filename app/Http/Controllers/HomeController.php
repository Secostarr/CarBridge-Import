<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\contact;
use App\Models\Home;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function index()
    {
        $home = Home::first(); // Get the first home record
        return view('backend.home', compact('home'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_situs' => 'required|string|max:255',
            'selogan' => 'required|string|max:255',
            'media_utama' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mediaUtamaPath = $request->file('media_utama')->store('media_utama', 'public');

        Home::create([
            'nama_situs' => $request->nama_situs,
            'selogan' => $request->selogan,
            'media_utama' => $mediaUtamaPath,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $home = Home::findOrFail($id);

        $request->validate([
            'nama_situs' => 'required|string|max:255',
            'selogan' => 'required|string|max:255',
            'media_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mediaUtamaPath = $home->media_utama;

        if ($request->hasFile('media_utama')) {
            // Delete the old file if exists
            if ($mediaUtamaPath && Storage::disk('public')->exists($mediaUtamaPath)) {
                Storage::disk('public')->delete($mediaUtamaPath);
            }

            // Store the new file
            $mediaUtamaPath = $request->file('media_utama')->store('media_utama', 'public');
        }

        $home->update([
            'nama_situs' => $request->nama_situs,
            'selogan' => $request->selogan,
            'media_utama' => $mediaUtamaPath,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Di Perbarui');
    }
}
