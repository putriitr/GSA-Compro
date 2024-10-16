<?php

namespace App\Http\Controllers\Admin\Parameter;

use App\Http\Controllers\Controller;
use App\Models\CompanyParameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyParameters = CompanyParameter::all();
        return view('admin.parameter.index', compact('companyParameters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.parameter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'nullable|email',
            'whatsapp_1' => 'nullable|string|max:20',
            'whatsapp_2' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'maps' => 'nullable|string',
            'visimisi_1' => 'nullable|string',
            'visimisi_2' => 'nullable|string',
            'visimisi_3' => 'nullable|string',
            'website' => 'nullable|url',
            'nomor_induk_berusaha' => 'nullable|string|max:50',
            'surat_keterangan' => 'nullable|string|max:50',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'ekatalog' => 'nullable|url',
            'nama_perusahaan' => 'nullable|string|max:255',
            'sejarah_singkat' => 'nullable|string',
        ]);

        // Menangani penyimpanan file logo
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('uploads/parameter', 'public');
        }

        // Menangani penyimpanan file about_gambar
        if ($request->hasFile('about_gambar')) {
            $validated['about_gambar'] = $request->file('about_gambar')->store('uploads/about', 'public');
        }

        CompanyParameter::create($validated);

        return redirect()->route('parameter.index')->with('success', 'Company parameter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $companyParameter = CompanyParameter::findOrFail($id);
        return view('admin.parameter.show', compact('companyParameter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $companyParameter = CompanyParameter::findOrFail($id);
        return view('admin.parameter.edit', compact('companyParameter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $companyParameter = CompanyParameter::findOrFail($id);

        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'sejarah_singkat' => 'nullable|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'maps' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'about_gambar' => 'nullable|image|max:2048',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'ekatalog' => 'nullable|string',
            'whatsapp_1' => 'nullable|string|max:255',
            'whatsapp_2' => 'nullable|string|max:255',
            'visimisi_1' => 'nullable|string',
            'visimisi_2' => 'nullable|string',
            'visimisi_3' => 'nullable|string',
            'website' => 'nullable|string|max:255',
            'nomor_induk_berusaha' => 'nullable|string|max:255',
            'surat_keterangan' => 'nullable|string|max:255',
        ]);

        // Menangani upload dan penghapusan logo
        if ($request->hasFile('logo')) {
            if ($companyParameter->logo) {
                Storage::delete('public/' . $companyParameter->logo);
            }
            $validated['logo'] = $request->file('logo')->store('uploads/parameter', 'public');
        }

        // Menangani upload dan penghapusan about_gambar
        if ($request->hasFile('about_gambar')) {
            if ($companyParameter->about_gambar) {
                Storage::delete('public/' . $companyParameter->about_gambar);
            }
            $validated['about_gambar'] = $request->file('about_gambar')->store('uploads/about', 'public');
        }

        $companyParameter->update($validated);

        return redirect()->route('parameter.index')->with('success', 'Company parameter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $companyParameter = CompanyParameter::findOrFail($id);

        // Hapus logo jika ada
        if ($companyParameter->logo) {
            Storage::delete('public/' . $companyParameter->logo);
        }

        // Hapus about_gambar jika ada
        if ($companyParameter->about_gambar) {
            Storage::delete('public/' . $companyParameter->about_gambar);
        }

        $companyParameter->delete();

        return redirect()->route('parameter.index')->with('success', 'Company parameter deleted successfully.');
    }
}
