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
                'nama' => 'Tools & Welding Machine',
            ],
            [
                'nama' => 'Workbench',
            ],
            [
                'nama' => 'CNC Machine',
            ],
            [
                'nama' => 'Alat Klimatologi & Geofisika',
            ],
            [
                'nama' => 'Alat Uji & Alat Ukur',
            ],
            [
                'nama' => 'Alat Survei',
            ],
            [
                'nama' => 'Tata Boga & Resto',
            ],
            [
                'nama' => 'Tata Kecantikan',
            ],
            [
                'nama' => 'Tata Busana',
            ],
            [
                'nama' => 'Barista',
            ],
            [
                'nama' => 'Machinery',
            ],
            [
                'nama' => 'Elevator',
            ],
            [
                'nama' => 'Alat Peraga',
            ],
            [
                'nama' => 'Alat Olahraga',
            ],
            [
                'nama' => 'Home Appliance',
            ],
            [
                'nama' => 'Persalatan Elektronik',
            ],
            [
                'nama' => 'Alat Laboratorium',
            ],
            [
                'nama' => 'Kendaraan Bermotor',
            ],
            [
                'nama' => 'Genset',
            ],
            [
                'nama' => 'APAR & Brankas',
            ],
            [
                'nama' => 'Power Tools',
            ],
        ]);
    }
}
