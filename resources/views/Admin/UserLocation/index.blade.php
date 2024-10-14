<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{
    // Menampilkan semua lokasi pengguna
    public function index()
    {
        $locations = UserLocation::all(); // Ambil semua data lokasi
        return view('admin.userlocations.index', compact('locations'));
    }

    // Menampilkan form untuk menambahkan lokasi baru
    public function create()
    {
        return view('admin.userlocations.create');
    }

    // Menyimpan lokasi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Menyimpan gambar
        $imagePath = $request->file('image')->store('locations', 'public');

        // Simpan data lokasi
        UserLocation::create([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $imagePath,
        ]);

        return redirect()->route('userlocations.index')->with('success', 'Location added successfully.');
    }

    // Menampilkan form untuk mengedit lokasi
    public function edit($id)
    {
        $location = UserLocation::findOrFail($id);
        return view('admin.userlocations.edit', compact('location'));
    }

    // Memperbarui data lokasi
    public function update(Request $request, $id)
    {
        $location = UserLocation::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Jika ada gambar yang diupload, simpan gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($location->image) {
                \Storage::disk('public')->delete($location->image);
            }
            $imagePath = $request->file('image')->store('locations', 'public');
            $location->image = $imagePath;
        }

        // Perbarui data lokasi
        $location->name = $request->name;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();

        return redirect()->route('userlocations.index')->with('success', 'Location updated successfully.');
    }

    // Menghapus lokasi
    public function destroy($id)
    {
        $location = UserLocation::findOrFail($id);

        // Hapus gambar jika ada
        if ($location->image) {
            \Storage::disk('public')->delete($location->image);
        }

        $location->delete();

        return redirect()->route('userlocations.index')->with('success', 'Location deleted successfully.');
    }
}
