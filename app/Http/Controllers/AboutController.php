<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
            'media_about' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filePath = $request->file('media_about')->store('about_media', 'public');

        About::create([
            'konten' => $request->konten,
            'media_about' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id_about)
    {
        $about = about::findOrFail($id_about);
        // dd($about);

        $request->validate([
            'konten' => 'nullable|string',
            'media_about' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan media_about lama
        $mediaAboutPath = $about->media_about;

        if ($request->hasFile('media_about')) {
            // Delete the old file if exists
            if ($mediaAboutPath && Storage::disk('public')->exists($mediaAboutPath)) {
                Storage::disk('public')->delete($mediaAboutPath);
            }

            // Store the new file
            $mediaAboutPath = $request->file('media_about')->store('media_about', 'public');
        }

        // Update data about
        $about->update([
            'konten' => $request->konten,
            'media_about' => $mediaAboutPath,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Di Perbarui');
    }
}
