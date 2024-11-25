<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\CategoryActivity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::paginate(10);
        return view('Admin.Activity.index', compact('activities'));
    }

    public function create()
    {
        $categories = CategoryActivity::all();
        return view('Admin.Activity.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_url' => 'required|image|max:2048',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_activities_id' => 'required|exists:category_activities,id',
        ]);

        // Simpan gambar dan dapatkan path
        $imagePath = $this->uploadImage($request->file('image_url'));

        Activity::create([
            'image_url' => $imagePath,  // Ganti 'image' menjadi 'image_url'
            'date' => $request->date,
            'title' => $request->title,
            'description' => $request->description,
            'category_activities_id' => $request->category_activities_id,
        ]);

        return redirect()->route('admin.activity.index')->with('success', 'Aktivitas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        $categories = CategoryActivity::all();
        return view('Admin.Activity.edit', compact('activity', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image_url' => 'nullable|image|max:2048',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_activities_id' => 'required|exists:category_activities,id',
        ]);

        $activity = Activity::findOrFail($id);

        $activity->date = $validatedData['date'];
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->category_activities_id = $validatedData['category_activities_id'];

        if ($request->hasFile('image_url')) {
            $this->deleteImage($activity->image_url);  // Ganti 'image' menjadi 'image_url'
            $imagePath = $this->uploadImage($request->file('image_url'));
            $activity->image_url = $imagePath;  // Ganti 'image' menjadi 'image_url'
        }

        $activity->save();

        return redirect()->route('admin.activity.index')->with('success', 'Aktivitas berhasil diperbarui.');
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('Admin.Activity.show', compact('activity'));
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->image_url) {  // Ganti 'image' menjadi 'image_url'
            $this->deleteImage($activity->image_url);
        }

        $activity->delete();
        return redirect()->route('admin.activity.index')->with('success', 'Aktivitas berhasil dihapus!');
    }

    private function uploadImage($image)
    {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/img/activity'), $imageName);
        return 'assets/img/activity/' . $imageName;
    }

    private function deleteImage($imagePath)
    {
        $fullPath = public_path($imagePath);
        if (file_exists($fullPath) && !is_dir($fullPath)) {
            unlink($fullPath);
        }
    }
}
