<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BidangPerusahaan;

class PortalVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Member.Portal.portalVendor.vendor-portal');
    }
}
