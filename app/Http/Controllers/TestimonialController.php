<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'konten' => 'required|string|max:255',
        ]);

        Testimonial::create([
            'label' => $request->label,
            'konten' => $request->konten,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id_testimonial)
    {
        // Cari testimonial berdasarkan ID
        $testimonial = Testimonial::findOrFail($id_testimonial);

        // Validasi data input
        $request->validate([
            'label' => 'required|string|max:255',
            'konten_testi' => 'required|string|max:255', // Sesuaikan dengan nama field di form
        ]);

        // Update data testimonial
        $testimonial->update([
            'label' => $request->label,
            'konten' => $request->konten_testi, // Sesuaikan dengan input dari form
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }
}
