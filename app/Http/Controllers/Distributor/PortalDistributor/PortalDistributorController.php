<?php

namespace App\Http\Controllers\Distributor\PortalDistributor;

use App\Http\Controllers\Controller;
use App\Models\BidangPerusahaan;
use App\Models\CustomerReport; // Import the CustomerReport model
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; // If you're using Maatwebsite for Excel export
use App\Exports\CustomerReportExport; // Ensure the correct path to your export class

class PortalDistributorController extends Controller
{
    // Display the main distributor portal view
    public function index()
    {
        return view('member.portal.portalDistributor.dist-portal');
    }

    // Display the customer report view with data
    public function customerReport(Request $request)
    {
        // Fetch customer reports with optional search filtering
        $search = $request->input('search');
        $customerReports = CustomerReport::when($search, function ($query, $search) {
            return $query->where('customer_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('company', 'like', "%{$search}%");
        })->paginate(10); // Pagination with 10 items per page

        return view('member.portal.portalDistributor.dist-report', compact('customerReports'));
    }

    // Display the quotation view
    public function quotation()
    {
        return view('member.portal.portalDistributor.dist-quotation');
    }

    // Display the proforma invoice view
    public function proformaInvoice()
    {
        return view('member.portal.portalDistributor.dist-proforma');
    }

    // Display the invoice view
    public function invoice()
    {
        return view('member.portal.portalDistributor.dist-invoice');
    }

    // Display the aftersales service view
    public function aftersalesService()
    {
        return view('member.portal.portalDistributor.dist-service');
    }

    // Method to export customer reports to Excel
    public function exportCustomerReport()
    {
        return Excel::download(new CustomerReportExport, 'customer_reports.xlsx');
    }
}
