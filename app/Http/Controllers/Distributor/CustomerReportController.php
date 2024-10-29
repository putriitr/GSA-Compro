<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Models\CustomerReport; // Adjust the path as necessary
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; // If you are using Maatwebsite Excel
use App\Exports\CustomerReportExport;

class CustomerReportController extends Controller
{
    public function index(Request $request)
    {
        // Fetch customer reports with optional search filtering
        $search = $request->input('search');
        $customerReports = CustomerReport::when($search, function ($query, $search) {
            return $query->where('customer_name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('company', 'like', "%{$search}%");
        })->paginate(10); // Pagination with 10 items per page

        // Pass the data to the view
        return view('customer_report.index', compact('customerReports'));
    }

    public function export()
    {
        // Logic for exporting the customer reports to Excel
        return Excel::download(new CustomerReportExport, 'customer_reports.xlsx');
    }
}
