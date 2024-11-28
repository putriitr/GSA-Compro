<?php

namespace App\Http\Controllers\Vendor\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warranty;
use App\Models\Vendor;
use App\Models\warranties;

class WarrantyController extends Controller
{
    public function create()
    {
        $vendors = Vendor::all();
        return view('admin.warranties.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'product_name' => 'required',
            'details' => 'required',
        ]);

        warranties::create($request->all());

        return redirect()->route('admin.warranties.index');
    }
}
