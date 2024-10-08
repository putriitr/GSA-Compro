<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\CategoryActivity;

class ActivityController extends Controller
{
    public function activity()
    {
        // Logic to retrieve activities or perform some action
        return view('admin.activity.index'); // Adjust the view name as needed
    }


    public function index()
    {
        // Ambil semua aktivitas untuk ditampilkan
        $activities = Activity::all();
        return view('admin.activity.index', compact('activities')); // Ganti rute tampilan
    }

    public function create()
    {
        // Ambil semua kategori aktivitas untuk dropdown
        $categories = CategoryActivity::all();
        return view('admin.activity.create', compact('categories')); // Ganti rute tampilan
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_activities_id' => 'required|exists:category_activities,id',
        ]);

        // Proses unggah gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Simpan aktivitas baru ke database
        $activity = Activity::create([
            'image' => $imageName,
            'date' => $request->date,
            'title' => $request->title,
            'description' => $request->description,
            'category_activities_id' => $request->category_activities_id,
        ]);
    }

    public function edit(Activity $activity)
    {
        // Ambil semua kategori untuk dropdown
        $categories = CategoryActivity::all();
        return view('admin.activity.edit', compact('activity', 'categories')); // Ganti rute tampilan
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_activities_id' => 'required|exists:category_activities,id', // Validasi kategori
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $activity->image = $imageName;
        }

        $activity->date = $request->date;
        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->category_activities_id = $request->category_activities_id;
        $activity->save();

        return redirect()->route('admin.activity.index')->with('success', 'Activity updated successfully.');
    }


    public function show(Activity $activity)
    {
        return view('admin.activity.show', compact('activity')); // Ganti rute tampilan
    }

    public function destroy(Activity $activity)
    {
        // Hapus gambar dari server jika ada
        if (file_exists(public_path('images/' . $activity->image))) {
            unlink(public_path('images/' . $activity->image));
        }
        // Hapus aktivitas dari database
        $activity->delete();
        return redirect()->route('admin.activity.index')->with('success', 'Activity deleted successfully.'); // Perbaiki rute
    }
}
