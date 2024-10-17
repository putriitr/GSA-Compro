<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BrandPartner;

class BrandPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrandPartner::create([
            'gambar' => 'assets/img/brandpartner/brand_1.jpg',
            'type' => 'partner',
            'url' => 'url1',
            'nama' => 'name1',
        ]);
    }
}
