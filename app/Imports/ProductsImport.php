<?php

namespace App\Imports;

use App\Models\Produk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    protected $vendorId;

    public function __construct($vendorId)
    {
        $this->vendorId = $vendorId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Produk::create([
                'vendor_id' => $this->vendorId,
                'product_name' => $row[0],
                // 'price' => $row[1],
            ]);
        }
    }
}
