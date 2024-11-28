<?php

namespace App\Http\Controllers\Vendor\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendorInvoice;
use App\Models\Vendor;

class VendorInvoiceController extends Controller
{
    public function create()
    {
        $vendors = Vendor::all();
        return view('admin.invoices.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required',
            'invoice_number' => 'required',
            'amount' => 'required|numeric',
            'invoice_attachment' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        $invoice = new vendorInvoice($request->all());

        if ($request->hasFile('invoice_attachment')) {
            $invoice->attachment = $request->file('invoice_attachment')->store('uploads/invoices');
        }

        $invoice->save();

        return redirect()->route('admin.invoices.index');
    }
}
