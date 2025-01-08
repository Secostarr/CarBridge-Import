<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first(); // Ambil data pertama di tabel About
        return view('backend.about.index', compact('about'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'konten_about' => 'required|string',
            'media_about' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filePath = $request->file('media_about')->store('about_media', 'public');

        About::create([
            'konten' => $request->konten_about,
            'media_about' => $filePath,
        ]);

        return response()->json(['message' => 'Data berhasil ditambahkan'], 201);
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'konten_about' => 'required|string',
            'media_about' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('media_about')) {
            // Hapus file lama jika ada
            if ($about->media_about && Storage::disk('public')->exists($about->media_about)) {
                Storage::disk('public')->delete($about->media_about);
            }

            $filePath = $request->file('media_about')->store('about_media', 'public');
            $about->media_about = $filePath;
        }

        $about->konten = $request->konten_about;
        $about->save();

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);

        if ($about->media_about && Storage::disk('public')->exists($about->media_about)) {
            Storage::disk('public')->delete($about->media_about);
        }

        $about->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
