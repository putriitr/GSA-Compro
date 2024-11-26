<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\BidangPerusahaan;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $query = Vendor::where('type', 0);

        if ($request->has('search') && $request->search !== null) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%");
            });
        }

        $vendors = $query->paginate(10);

        return view('Admin.Vendors.index', compact('vendors'));
    }

    public function create()
    {
        $locations = Location::all();
        $bidangPerusahaan = BidangPerusahaan::all();
        return view('Admin.Vendors.create', compact('locations', 'bidangPerusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nama_perusahaan' => 'nullable|string|max:255',
            'bidang_perusahaan' => 'nullable|exists:bidang_perusahaan,id',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'location_id' => 'nullable|exists:locations,id',
        ]);

        $randomPassword = Str::random(8);

        $user = Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($randomPassword),
            'type' => 0,
            'nama_perusahaan' => $request->nama_perusahaan,
            'location_id' => $request->location_id,
            'bidang_id' => $request->bidang_perusahaan,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,

        ]);

        session()->flash('password', $randomPassword);

        return redirect()->route('admin.vendors.show', $user->id);
    }

    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        $password = session('password');

        return view('Admin.Vendors.show', compact('vendor', 'password'));
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        $bidangPerusahaan = BidangPerusahaan::all();
        return view('Admin.Vendors.edit', compact('vendor', 'bidangPerusahaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:vendors,email,' . $id,
            'company_name' => 'nullable|string|max:255',
            'business_field' => 'nullable|exists:bidang_perusahaan,id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $vendor = Vendor::findOrFail($id);

        $vendor->update([
            'name' => $request->name,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'business_field_id' => $request->business_field,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($request->filled('password')) {
            $vendor->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor deleted successfully.');
    }
}
