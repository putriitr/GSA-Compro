<?php

namespace App\Http\Controllers\Vendor\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\vendorPO;
use App\Mail\PurchaseOrderMail;
use Illuminate\Support\Facades\Mail;

class VendorPOController extends Controller
{
    public function create()
    {
        $vendors = Vendor::all();
        return view('admin.purchase_orders.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required',
            'po_number' => 'required',
            'items' => 'required',
            'quantity' => 'required|integer',
        ]);

        $po = vendorPO::create($request->all());

        // Send Purchase Order email
        $vendor = Vendor::find($request->vendor_id);
        Mail::to($vendor->email)->send(new PurchaseOrderMail($po));

        return redirect()->route('admin.purchase-orders.index');
    }
}
