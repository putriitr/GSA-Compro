<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compro_parameter')->insert([
            [
                'email' => 'info@gsacommerce.com',
                'no_telepon' => '+62 821-1470-2128',
                'no_wa' => '+62 813-9006-9009',
                'alamat' => 'BIZPARK JABABEKA, Jl. Niaga Industri Selatan 2 Blok QQ2 No.6, Kel. Pasirsari, Kec. Cikarang Selatan, Kabupaten Bekasi, Provinsi Jawa Barat',
                'maps' => 'https://www.google.com/maps/place/PT.+Arkamaya+Guna+Saharsa/@-6.2114159,106.8600596,15z/data=!4m2!3m1!1s0x0:0x1bc64c80b9328ca6?sa=X&ved=1t:2428&ictx=111',
                'visi' => 'Perusahaan rintisan teknologi yang menyediakan solusi inovatif untuk tumbuh dan memberikan nilai tambah bagi industri Anda.',
                'misi' => 'Dengan memberikan pelayanan terbaik melalui inovasi sehingga Anda mendapatkan solusi yang tepat dalam memenuhi setiap kebutuhan dengan orientasi yang detail dan juga garansi yang dapat diandalkan.',
                'instagram' => 'None',
                'linkedin' => 'https://www.linkedin.com/company/arkamaya-guna-saharsa/?originalSubdomain=id',
                'ekatalog' => 'https://e-katalog.lkpp.go.id/info/penyedia/444815?komoditasId=812',
                'nama_perusahaan' => 'PT. Gudang Solusi Acommerce',
                'sejarah_singkat' => 'Toko GSacommerce menyediakan Peralatan Pelatihan, Perkakas, Peralatan Rumah Tangga, Peralatan Elektronik, Peralatan Laboratorium dan Peralatan Olahraga serta Produsen Tenda. Dikelola oleh PT. Gudang Solusi Acommerce yang bergerak di bidang Industrial E-commerce.',
            ]
        ]);
    }
}
