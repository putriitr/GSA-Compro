<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Models\BidangPerusahaan;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::paginate(10);
        return view('admin.distributors.index', compact('distributors'));
    }

    public function create()
    {
        $locations = Location::all();
        $bidangPerusahaan = BidangPerusahaan::all();
        return view('admin.distributors.create', compact('locations', 'bidangPerusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:distributors',
            'no_telepon' => 'required|string|max:15',
        ]);

        Distributor::create($request->only(['nama_perusahaan', 'email', 'no_telepon']));
        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil ditambahkan.');
    }

    public function show($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributors.show', compact('distributor'));
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributors.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:distributors,email,' . $id,
            'no_telepon' => 'required|string|max:15',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->only(['nama_perusahaan', 'email', 'no_telepon']));
        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();
        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil dihapus.');
    }
}
