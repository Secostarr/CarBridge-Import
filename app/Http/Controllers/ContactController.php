<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:120',
            'phone_number' => 'nullable|string|max:20',
            'url_github' => 'nullable|url|max:255',
            'url_instagram' => 'nullable|url|max:255',
        ]);

        contact::create([
            'lokasi' => $request->lokasi,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'url_github' => $request->url_github,
            'url_instagram' => $request->url_instagram,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id_contact)
    {
        // Cari testimonial berdasarkan ID
        $contact = contact::findOrFail($id_contact);

        // Validasi data input
        $request->validate([
            'lokasi' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:120', 
            'phone_number' => 'nullable|string|max:20', 
            'url_github' => 'nullable|url|max:255', 
            'url_instagram' => 'nullable|url|max:255', 
        ]);

        // Update data testimonial
        $contact->update([
            'lokasi' => $request->lokasi,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'url_github' => $request->url_github,
            'url_instagram' => $request->url_instagram,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }
}
