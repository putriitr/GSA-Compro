<?php

namespace App\Http\Controllers\Distributor\PortalDistributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortalDistributorController extends Controller
{
    public function index()
    {
        return view('member.portal.dist-portal');
    }
}
