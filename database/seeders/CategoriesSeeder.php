<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'nama' => 'Cutting Tools',
            ],
            [
                'nama' => 'Fastening Tools',
            ],
            [
                'nama' => 'Mechanics Tools',
            ],
            [
                'nama' => 'Holding Tools',
            ],
            [
                'nama' => 'Tool Storage & Assortment',
            ],
            [
                'nama' => 'Universal Drill & Bitt set',
            ],
            [
                'nama' => 'Stringking Tools',
            ],
            [
                'nama' => 'Plumbing Tools',
            ],
            [
                'nama' => 'Machine',
            ],
            [
                'nama' => 'Measuring Tools',
            ],
            [
                'nama' => 'Safety Equipment',
            ],
            [
                'nama' => 'VDE Tools',
            ],
            [
                'nama' => 'Constructing Tools',
            ],
            [
                'nama' => 'Working Table',
            ],
            [
                'nama' => 'Finishing Tools',
            ],
            [
                'nama' => 'Sawing Tools',
            ],
            [
                'nama' => 'Other Products',
            ],
        ]);
    }
}
