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
                'maps' => 'None',
                'instagram' => 'None',
                'linkedin' => 'None',
                'ekatalog' => 'None',
                'nama_perusahaan' => 'PT. Gudang Solusi Acommerce',
                'sejarah_singkat' => 'Toko GSacommerce menyediakan Peralatan Pelatihan, Perkakas, Peralatan Rumah Tangga, Peralatan Elektronik, Peralatan Laboratorium dan Peralatan Olahraga serta Produsen Tenda. Dikelola oleh PT. Gudang Solusi Acommerce yang bergerak di bidang Industrial E-commerce.',
                'whatsapp_1' => '+62 821-1470-2128',
                'whatsapp_2' => '+62 813-9006-9009',
                'visimisi_1' => 'Menjadi penyedia layanan yang profesional, dengan komitmen untuk memberikan solusi terbaik yang memenuhi kebutuhan dan harapan pelanggan kami.',
                'visimisi_2' => 'Mewujudkan produk dan layanan berkualitas tinggi yang berfokus pada inovasi dan ketepatan, memastikan setiap pelanggan mendapatkan nilai terbaik.',
                'visimisi_3' => 'Memberikan kemudahan dan kenyamanan dalam setiap interaksi, sehingga pelanggan dapat menikmati pengalaman yang efisien dan tanpa hambatan dengan kami.',
                'nomor_induk_berusaha' => '0220207740969',
                'surat_keterangan' => 'AHU-0137094.AH.01.11. Tahun 2023',
                'website' => 'https://gsacommerce.com',
            ]
        ]);
    }
}
