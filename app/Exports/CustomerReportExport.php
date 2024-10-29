<?php

namespace App\Exports;

use App\Models\CustomerReport;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerReportExport implements FromCollection
{
    public function collection()
    {
        return CustomerReport::all(); // Fetch all customer reports or filter as needed
    }
}

