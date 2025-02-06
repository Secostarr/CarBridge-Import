<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\contact;
use App\Models\Home;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function update(Request $request)
    {
        $id_admin = Auth::user()->id_user;
        $admin = User::find($id_admin);

        $request->validate([
            'nama' => 'nullable|max:50',
            'username' => 'nullable|max:70',
            'email' => 'nullable|email',
            'password' => 'nullable|min:8',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        // Foto lama
        $foto = $admin->foto;

        // Proses upload foto jika ada file baru
        if ($request->hasFile('foto')) {
            if ($foto) {
                Storage::disk('public')->delete($foto);
            }
            $uniqueFile = uniqid() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('foto_admin', $uniqueFile, 'public');
            $foto = 'foto_admin/' . $uniqueFile;
        }

        // Update data admin
        $admin->update([
            'nama' => $request->filled('nama') ? $request->nama : $admin->nama,
            'username' => $request->filled('username') ? $request->username : $admin->username,
            'email' => $request->filled('email') ? $request->email : $admin->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $admin->password,
            'foto' => $foto,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

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
        $testimoni = Testimonial::all();
        return view('backend.testimonial', compact('testimoni'));
    }

    public function contact()
    {
        $contact = contact::first();
        return view('backend.contact', compact('contact'));
    }
}
