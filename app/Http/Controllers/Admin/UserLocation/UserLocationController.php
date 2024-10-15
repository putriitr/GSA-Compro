<?php

namespace App\Http\Controllers\Admin\UserLocation;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{
    public function index()
    {
        $userLocations = UserLocation::all();
        return view('admin.userlocation.index', compact('userLocations'));
    }

    public function create()
    {
        return view('admin.userlocation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        $userLocation = new UserLocation();
        $userLocation->name = $request->name;

        // Simpan gambar ke public/assets/img
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img'), $filename);
            $userLocation->image = $filename;
        }

        $userLocation->latitude = $request->latitude;
        $userLocation->longitude = $request->longitude;
        $userLocation->save();

        return redirect()->route('userlocations.index')->with('success', 'Lokasi pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $userLocation = UserLocation::findOrFail($id);
        return view('admin.userlocation.edit', compact('userLocation'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        $userLocation = UserLocation::findOrFail($id);
        $userLocation->name = $request->name;
        $userLocation->latitude = $request->latitude;
        $userLocation->longitude = $request->longitude;

        if ($request->hasFile('image')) {
            if ($userLocation->image) {
                $oldImagePath = public_path('assets/img/' . $userLocation->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img'), $imageName);
            $userLocation->image = $imageName;
        }

        $userLocation->save();

        return redirect()->route('userlocations.index')->with('success', 'Lokasi pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $userLocation = UserLocation::findOrFail($id);

        if ($userLocation->image) {
            $imagePath = public_path('assets/img/' . $userLocation->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $userLocation->delete();

        return redirect()->route('userlocations.index')->with('success', 'Lokasi pengguna berhasil dihapus!');
    }
}
