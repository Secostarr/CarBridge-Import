<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function cars()
    {
        $car = car::all();
        return view('backend.cars', compact('car'));
    }

    public function store(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'merek' => 'required|string|in:BMW,Mercedes,Porsche,Subaru,Toyota,Nissan',
            'car_type' => 'required|string|max:255',
            'type_of_car' => 'required|string|max:255',
            'photo' => 'required|image', // Foto wajib diunggah
            'description' => 'required|string',
            'engine' => 'required|string|max:255',
            'transmission' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'feature' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:sold,for_sale',
        ]);

        // Proses unggah file foto
        if ($request->hasFile('photo')) {
            $uniqueFile = uniqid() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('car_photo', $uniqueFile, 'public');
            $photoPath = 'car_photo/' . $uniqueFile; // Path foto untuk disimpan di database
        } else {
            return redirect()->back()->withErrors(['photo' => 'Foto wajib diunggah.']);
        }

        // Menyimpan data ke dalam database
        car::create([
            'merek' => $request->merek,
            'car_type' => $request->car_type,
            'type_of_car' => $request->type_of_car,
            'photo' => $photoPath, // Simpan path foto ke database
            'description' => $request->description,
            'engine' => $request->engine,
            'transmission' => $request->transmission,
            'capacity' => $request->capacity,
            'feature' => $request->feature,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        // Mengarahkan kembali ke halaman daftar mobil dengan pesan sukses
        return redirect()
            ->route('admin.dashboard.cars')
            ->with('success', 'Data mobil berhasil ditambahkan.');
    }

    public function update(Request $request, $id_cars)
    {
        // Cari data mobil berdasarkan ID
        $cars = Car::find($id_cars);

        if (!$cars) {
            return redirect()->back()->withErrors(['error' => 'Data mobil tidak ditemukan.']);
        }

        // Validasi input pengguna
        $request->validate([
            'merek' => 'required|string|in:BMW,Mercedes,Porsche,Subaru,Toyota,Nissan',
            'car_type' => 'required|string|max:255',
            'type_of_car' => 'required|string|max:255',
            'photo' => 'nullable|image', // Foto tidak wajib diunggah
            'description' => 'required|string',
            'engine' => 'required|string|max:255',
            'transmission' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'feature' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:sold,for_sale',
        ]);
        
        // Proses unggah file foto jika ada file baru
        if ($request->hasFile('photo')) {
            $uniqueFile = uniqid() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('car_photo', $uniqueFile, 'public');
            $photoPath = 'car_photo/' . $uniqueFile; // Path foto untuk disimpan di database

            // Hapus foto lama dari penyimpanan
            if ($cars->photo && Storage::disk('public')->exists($cars->photo)) {
                Storage::disk('public')->delete($cars->photo);
            }
        } else {
            $photoPath = $cars->photo; // Gunakan foto lama jika tidak ada foto baru
        }

        // Update data mobil di database
        $cars->update([
            'merek' => $request->merek,
            'car_type' => $request->car_type,
            'type_of_car' => $request->type_of_car,
            'photo' => $photoPath, // Simpan path foto (lama atau baru)
            'description' => $request->description,
            'engine' => $request->engine,
            'transmission' => $request->transmission,
            'capacity' => $request->capacity,
            'feature' => $request->feature,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        // Redirect kembali ke halaman daftar mobil dengan pesan sukses
        return redirect()
            ->route('admin.dashboard.cars')
            ->with('success', 'Data mobil berhasil diperbarui.');
    }

    public function delete($id_cars)
    {
        $item = car::find($id_cars);

        if ($item) {
            $item->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item deleted successfully.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Item not found.'
        ], 404);
    }
}
