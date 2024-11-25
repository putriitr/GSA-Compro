<?php

namespace App\Http\Controllers\Admin\Meta;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MetaController extends Controller
{
    public function index()
    {
        $metas = Meta::all();
        return view('Admin.Meta.index', compact('metas'));
    }

    public function create()
    {
        return view('Admin.Meta.create');
    }

    public function show($slug)
    {
        $meta = Meta::where('slug', $slug)->firstOrFail();
        return view('Admin.Meta.show', compact('meta'));
    }

    public function edit($id)
    {
        $meta = Meta::findOrFail($id);
        return view('Admin.Meta.edit', compact('meta'));
    }

    public function destroy($id)
    {
        $meta = Meta::findOrFail($id);
        $meta->delete();

        return redirect()->route('admin.meta.index')->with('success', 'Meta deleted successfully.');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:pengumuman,promosi',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'content' => 'required|string',
        ]);

        // Buat instance model Meta dan simpan data
        $meta = new Meta();
        $meta->title = $request->title;
        $meta->type = $request->type;
        $meta->start_date = $request->start_date;
        $meta->end_date = $request->end_date;
        $meta->content = $request->content;
        // Generate slug berdasarkan title
        $meta->slug = Str::slug($request->title);
        $meta->save();

        return redirect()->route('admin.meta.index')->with('success', 'Meta berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'type' => 'required|in:pengumuman,promosi',
            'content' => 'required|string',
        ]);

        $meta = Meta::findOrFail($id);

        // Update data
        $meta->title = $request->title;
        $meta->type = $request->type;
        $meta->start_date = $request->start_date;
        $meta->end_date = $request->end_date;
        $meta->content = $request->content;
        // Generate slug baru jika title berubah
        if ($meta->title !== $request->title) {
            $meta->slug = Str::slug($request->title);
        }
        $meta->save();

        return redirect()->route('admin.meta.index')->with('success', 'Meta updated successfully.');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $filename);

            // Mengembalikan URL gambar yang sudah diupload
            return response()->json([
                'link' => asset('storage/images/' . $filename)
            ]);
        }
        return response()->json(['error' => 'File upload failed.'], 500);
    }
}
