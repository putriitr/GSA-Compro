<?php

namespace App\Http\Controllers\Admin\UserLocation;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserLocationController extends Controller
{
    public function index()
    {
        $locations = UserLocation::all();
        return view('admin.userlocation.index', compact('locations'));
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
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $path = $request->file('image')->store('images', 'public');

        UserLocation::create([
            'name' => $request->name,
            'image' => $path,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('userlocations.index')->with('success', 'Location added successfully.');
    }

    public function edit(UserLocation $userLocation)
    {
        return view('admin.userlocation.edit', compact('userLocation'));
    }

    public function update(Request $request, UserLocation $userLocation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($userLocation->image);
            $path = $request->file('image')->store('images', 'public');
            $userLocation->image = $path;
        }

        $userLocation->name = $request->name;
        $userLocation->latitude = $request->latitude;
        $userLocation->longitude = $request->longitude;
        $userLocation->save();

        return redirect()->route('userlocations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(UserLocation $userLocation)
    {
        Storage::disk('public')->delete($userLocation->image);
        $userLocation->delete();

        return redirect()->route('userlocations.index')->with('success', 'Location deleted successfully.');
    }
}
