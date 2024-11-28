<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function portal()
    {
        return view('Vendor.Portal.portal');  // Pastikan tampilan ini benar
    }
}
