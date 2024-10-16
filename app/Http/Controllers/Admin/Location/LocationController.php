<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.location.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|image', // This should match your database field
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Handle file upload
        $image = $request->file('image_url');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/img'), $imageName);
        $imagePath = 'assets/img/' . $imageName;

        Location::create([
            'name' => $request->name,
            'image_url' => $imagePath, // Ensure this is the field you intend to use
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('admin.location.index')->with('success', 'Location added successfully.');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'image|nullable', // Make image optional for update
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Update image only if a new one is uploaded
        if ($request->hasFile('image_url')) {
            // Delete the old image if it exists
            if (File::exists(public_path($location->image_url))) {
                File::delete(public_path($location->image_url));
            }

            // Save new image to public/assets/img/slider
            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img/slider'), $imageName);
            $location->image_url = 'assets/img/slider/' . $imageName; // Update image path
        }

        // Update other fields
        $location->name = $request->name;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;

        $location->save();

        return redirect()->route('admin.location.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        // Delete the old image if it exists
        if (File::exists(public_path($location->image_url))) {
            File::delete(public_path($location->image_url));
        }

        $location->delete();

        return redirect()->route('admin.location.index')->with('success', 'Location deleted successfully.');
    }
}
