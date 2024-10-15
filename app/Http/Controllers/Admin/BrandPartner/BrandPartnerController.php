<?php

namespace App\Http\Controllers\Admin\BrandPartner;

use App\Http\Controllers\Controller;
use App\Models\BrandPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandPartnerController extends Controller
{
    public function index()
    {
        $brandPartners = BrandPartner::all();
        return view('admin.brand.index', compact('brandPartners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'required|image|max:2048',
            'type' => 'required|in:brand,partner,principal',
            'url' => 'nullable|string',
            'nama' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            // Menyimpan gambar ke lokasi yang ditentukan
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/img', $filename); // Menyimpan di D:\UMALO\GSA-Compro\public\assets\img
            $validated['gambar'] = 'assets/img/' . $filename; // Simpan path di database
        }

        BrandPartner::create($validated);

        return redirect()->route('admin.brand.index')->with('success', 'Brand Partner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brandPartner = BrandPartner::findOrFail($id);
        return view('admin.brand.show', compact('brandPartner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brandPartner = BrandPartner::findOrFail($id);
        return view('admin.brand.edit', compact('brandPartner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|max:2048',
            'type' => 'required|in:brand,partner,principal',
            'url' => 'nullable|string',
            'nama' => 'nullable|string',
        ]);

        $brandPartner = BrandPartner::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($brandPartner->gambar) {
                $oldImagePath = public_path($brandPartner->gambar); // Menggunakan public_path
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Menghapus file lama
                }
            }

            // Menyimpan gambar baru ke lokasi yang ditentukan
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/img', $filename); // Menyimpan di D:\UMALO\GSA-Compro\public\assets\img
            $validated['gambar'] = 'assets/img/' . $filename; // Simpan path di database
        }

        $brandPartner->update($validated);

        return redirect()->route('admin.brand.index')->with('success', 'Brand Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brandPartner = BrandPartner::findOrFail($id);

        if ($brandPartner->gambar) {
            Storage::delete('public/' . $brandPartner->gambar);
        }

        $brandPartner->delete();

        return redirect()->route('admin.brand.index')->with('success', 'Brand Partner deleted successfully.');
    }
}
