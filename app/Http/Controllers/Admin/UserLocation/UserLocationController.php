<?php

namespace App\Http\Controllers\Admin\UserLocation;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use Illuminate\Http\Request;

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
            'name' => 'required',
            'image' => 'required|image',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        UserLocation::create([
            'name' => $request->name,
            'image' => $imagePath,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('userlocations.index')->with('success', 'Location created successfully.');
    }

    public function show(UserLocation $userLocation)
    {
        return view('admin.userlocation.show', compact('userLocation'));
    }

    public function edit(UserLocation $userLocation)
    {
        return view('admin.userlocation.edit', compact('userLocation'));
    }

    public function update(Request $request, UserLocation $userLocation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('user_images');
            $userLocation->image = $path;
        }

        $userLocation->name = $request->name;
        $userLocation->position_top = $request->position_top;
        $userLocation->position_left = $request->position_left;

        $userLocation->save();

        return redirect()->route('userlocations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(UserLocation $userLocation)
    {
        $userLocation->delete();
        return redirect()->route('userlocations.index')->with('success', 'Location deleted successfully.');
    }
}
