<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use App\Models\BidangPerusahaan;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::paginate(10);
        return view('admin.vendor.index', compact('vendors'));
    }

    public function create()
    {
        $locations = Location::all();
        $bidangPerusahaan = BidangPerusahaan::all();
        return view('admin.vendor.create', compact('locations', 'bidangPerusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'nama_pic' => 'required|string|max:255',
            'no_telepon_pic' => 'required|string|max:15',
            'email' => 'required|email|unique:vendors',
            'akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'nib' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $vendor = new Vendor();
        $vendor->nama_perusahaan = $request->nama_perusahaan;
        $vendor->alamat = $request->alamat;
        $vendor->no_telepon = $request->no_telepon;
        $vendor->nama_pic = $request->nama_pic;
        $vendor->no_telepon_pic = $request->no_telepon_pic;
        $vendor->email = $request->email;

        if ($request->hasFile('akta')) {
            $vendor->akta = 'assets/img/vendor/' . $request->file('akta')->store('vendor/akta', 'public');
        }

        if ($request->hasFile('nib')) {
            $vendor->nib = 'assets/img/vendor/' . $request->file('nib')->store('vendor/nib', 'public');
        }

        $vendor->save();

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    public function show(Vendor $vendor)
    {
        return view('admin.vendor.show', compact('vendor'));
    }

    public function edit(Vendor $vendor)
    {
        return view('admin.vendor.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'nama_pic' => 'required|string|max:255',
            'no_telepon_pic' => 'required|string|max:15',
            'email' => 'required|email|unique:vendors,email,' . $vendor->id,
            'akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'nib' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $vendor->nama_perusahaan = $request->nama_perusahaan;
        $vendor->alamat = $request->alamat;
        $vendor->no_telepon = $request->no_telepon;
        $vendor->nama_pic = $request->nama_pic;
        $vendor->no_telepon_pic = $request->no_telepon_pic;
        $vendor->email = $request->email;

        if ($request->hasFile('akta')) {
            // Hapus file lama jika ada
            if ($vendor->akta) {
                Storage::disk('public')->delete($vendor->akta);
            }
            $vendor->akta = 'assets/img/vendor/' . $request->file('akta')->store('vendor/akta', 'public');
        }

        if ($request->hasFile('nib')) {
            // Hapus file lama jika ada
            if ($vendor->nib) {
                Storage::disk('public')->delete($vendor->nib);
            }
            $vendor->nib = 'assets/img/vendor/' . $request->file('nib')->store('vendor/nib', 'public');
        }

        $vendor->save();

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy(Vendor $vendor)
    {
        // Hapus file jika ada
        if ($vendor->akta) {
            Storage::disk('public')->delete($vendor->akta);
        }

        if ($vendor->nib) {
            Storage::disk('public')->delete($vendor->nib);
        }

        $vendor->delete();

        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully.');
    }
}
