<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\CategoryActivity;

class ActivityController extends Controller
{
    // public function activity()
    // {
    //     // Logic to retrieve activities or perform some action
    //     $activities = Activity::all();
    //     return view('admin.activity.index', compact('activities')); // Adjust the view name as needed
    // }


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
        // Validasi input
        $request->validate([
            'image_url' => 'required|image',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_activities_id' => 'required|exists:category_activities,id',
        ]);

        // Save image to public/assets/img/activity
        $image = $request->file('image_url');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/img/activity'), $imageName);
        $imagePath = 'assets/img/activity/' . $imageName;

        // Membuat aktivitas baru
        Activity::create([
            'image_url' => $imagePath, // Simpan ke 'image_url'
            'date' => $request->date,
            'title' => $request->title,
            'description' => $request->description,
            'category_activities_id' => $request->category_activities_id,
        ]);

        return redirect()->route('admin.activity.index')->with('success', 'Aktivitas berhasil ditambahkan!');
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
            'image_url' => 'nullable|image',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_activities_id' => 'required|exists:category_activities,id',
        ]);

        if ($request->hasFile('image_url')) {
            // Menyimpan gambar baru jika di-upload
            $image = $request->file('image_url'); // Ganti 'image' dengan 'image_url'
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img/activity'), $imageName);
            $activity->image_url = 'assets/img/activity/' . $imageName; // Ganti 'image' menjadi 'image_url'
        }

        // Update data aktivitas
        $activity->date = $request->date;
        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->category_activities_id = $request->category_activities_id;
        $activity->save();

        return redirect()->route('admin.activity.index')->with('success', 'Aktivitas berhasil diperbarui!');
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
