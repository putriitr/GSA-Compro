<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Meta;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


class SliderController extends Controller
{
    // Display all sliders
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    // Show form to create a new slider
    public function create()
    {
        $activities = Activity::all(); // Retrieve all activities
        $routes = [
            // Define your predefined routes here
            'home' => route('home'),
            'about' => route('about'),
            // Add other predefined routes as needed
        ];

        $metas = Meta::where('start_date', '<=', today())
            ->where('end_date', '>=', today())
            ->get();

        return view('admin.slider.create', compact('activities', 'routes', 'metas'));
    }

    // Store new slider
    public function store(Request $request)
    {
        $request->validate([
            'image_url' => 'required|image|max:2048',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_activities_id' => 'required|exists:category_activities,id',
        ]);

        // Simpan gambar di folder yang benar
        $image = $request->file('image_url');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/img/activity'), $imageName);
        $imagePath = 'assets/img/activity/' . $imageName;

        // Buat aktivitas baru
        Activity::create([
            'image' => $imagePath,
            'date' => $request->date,
            'title' => $request->title,
            'description' => $request->description,
            'category_activities_id' => $request->category_activities_id,
        ]);

        return redirect()->route('admin.activity.index')->with('success', 'Aktivitas berhasil ditambahkan!');
    }

    // Show form to edit an existing slider
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $activities = Activity::all(); // Fetch activities for editing
        $routes = [
            'about' => route('about'),
            'product' => route('product.index'),
            'portal' => route('portal'),
        ];

        $metas = Meta::where('start_date', '<=', today())
            ->where('end_date', '>=', today())
            ->get();

        return view('admin.slider.edit', compact('slider', 'routes', 'activities', 'metas'));
    }

    // Update slider
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'image_url' => 'nullable|image',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string',
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image_url')) {
            // Delete the old image
            if (File::exists(public_path($slider->image_url))) {
                File::delete(public_path($slider->image_url));
            }

            // Save new image to public/assets/img/slider
            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img/slider'), $imageName);
            $slider->image_url = 'assets/img/slider/' . $imageName;
        }

        // Dynamic button URL handling
        if ($request->filled('activity_id')) {
            $activity = Activity::find($request->activity_id);
            $slider->button_url = route('activity.show', $activity->id);
        } elseif ($request->filled('meta_slug')) {
            $meta = Meta::where('slug', $request->meta_slug)->firstOrFail();
            $slider->button_url = route('member.meta.show', $meta->slug);
        } else {
            $slider->button_url = $request->button_url;
        }

        // Update other fields
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->description = $request->description;
        $slider->button_text = $request->button_text;
        $slider->save();

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
    }

    // Delete slider
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Delete the image file
        if (File::exists(public_path($slider->image_url))) {
            File::delete(public_path($slider->image_url));
        }

        $slider->delete();

        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
    }
}
