<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('locations')->insert([
            [
                'name' => 'Dinas Kesehatan Prov. Sumatera Utara',
                'image' => 'assets/img/user/dinas_kesehatan_sumut.png',
                'latitude' => 3.597031,
                'longitude' => 98.678513
            ],
            [
                'name' => 'Politeknik Negeri Medan',
                'image' => 'assets/img/user/politeknik_negeri_medan.jpg',
                'latitude' => 3.5617,
                'longitude' => 98.6535
            ],
            [
                'name' => 'BBPPMPV Bidang Bangunan dan Listrik Medan',
                'image' => 'assets/img/user/bbppmpv_medan.jpg',
                'latitude' => 3.5822,
                'longitude' => 98.6756
            ],
            [
                'name' => 'Universitas Sumatera Utara',
                'image' => 'assets/img/user/universitas_sumatera_utara.jpg',
                'latitude' => 3.5647,
                'longitude' => 98.6528
            ],
            [
                'name' => 'Politeknik Negeri Sriwijaya',
                'image' => 'assets/img/user/politeknik_sriwijaya.jpg',
                'latitude' => -2.963,
                'longitude' => 104.742
            ],
            [
                'name' => 'Politeknik Manufaktur Negeri Bangka Belitung',
                'image' => 'assets/img/user/politeknik_bangka_belitung.jpg',
                'latitude' => -2.162,
                'longitude' => 106.136
            ],
            [
                'name' => 'Universitas Andalas',
                'image' => 'assets/img/user/universitas_andalas.jpg',
                'latitude' => -0.914,
                'longitude' => 100.459
            ],
            [
                'name' => 'POLTEKES KEMENKES Bengkulu',
                'image' => 'assets/img/user/politekes_bengkulu.jpg',
                'latitude' => -3.788,
                'longitude' => 102.262
            ],
            [
                'name' => 'Direktorat Bina Kelembagaan Pelatihan Vokasi',
                'image' => 'assets/img/user/direktorat_bina_kelembagaan.jpg',
                'latitude' => -6.200,
                'longitude' => 106.816
            ],
            [
                'name' => 'Komisi Pemberantasan Korupsi',
                'image' => 'assets/img/user/kpk.jpg',
                'latitude' => -6.211,
                'longitude' => 106.845
            ],
            [
                'name' => 'Badan Nasional Penanggulangan Bencana',
                'image' => 'assets/img/user/bnpb.jpg',
                'latitude' => -6.194,
                'longitude' => 106.822
            ],
            [
                'name' => 'Suku Dinas Pemuda & Olahraga Jakarta Utara',
                'image' => 'assets/img/user/suku_dinas_jakarta_utara.jpg',
                'latitude' => -6.118,
                'longitude' => 106.846
            ],
            [
                'name' => 'RSUD Sawah Besar',
                'image' => 'assets/img/user/rsud_sawah_besar.jpg',
                'latitude' => -6.166,
                'longitude' => 106.822
            ],
            [
                'name' => 'Sekretariat Utama BMKG',
                'image' => 'assets/img/user/bmkg.jpg',
                'latitude' => -6.183,
                'longitude' => 106.833
            ],
            [
                'name' => 'Politeknik Negeri Jakarta',
                'image' => 'assets/img/user/politeknik_negeri_jakarta.jpg',
                'latitude' => -6.362,
                'longitude' => 106.831
            ],
            [
                'name' => 'RS Kanker Dharmais',
                'image' => 'assets/img/user/rs_kanker_dharmais.jpg',
                'latitude' => -6.185,
                'longitude' => 106.798
            ],
            [
                'name' => 'KPU Kota Tangerang',
                'image' => 'assets/img/user/kpu_tangerang.jpg',
                'latitude' => -6.176,
                'longitude' => 106.628
            ],
            [
                'name' => 'Dinas Kesehatan Kota Tangerang',
                'image' => 'assets/img/user/dinas_kesehatan_tangerang.jpg',
                'latitude' => -6.176,
                'longitude' => 106.631
            ],
            [
                'name' => 'RS Dr. Marzuki Mahdi',
                'image' => 'assets/img/user/rs_marzuki_mahdi.jpg',
                'latitude' => -6.597,
                'longitude' => 106.802
            ],
            [
                'name' => 'BBPPMPV Bidang Mesin dan Teknik Industri Jawa Barat',
                'image' => 'assets/img/user/bbppmpv_jabar.jpg',
                'latitude' => -6.935,
                'longitude' => 107.655
            ],
            [
                'name' => 'Dinas Pendidikan & Kebudayaan Kalimantan Timur',
                'image' => 'assets/img/user/dinas_pendidikan_kaltim.jpg',
                'latitude' => -0.500,
                'longitude' => 117.146
            ],
            [
                'name' => 'Sekretariat Daerah Murung Raya',
                'image' => 'assets/img/user/sekretariat_murung_raya.jpg',
                'latitude' => -0.667,
                'longitude' => 114.289
            ],
            [
                'name' => 'Badan Penelitian dan Pengembangan Daerah KALTIM',
                'image' => 'assets/img/user/badan_penelitian_kaltim.jpg',
                'latitude' => -0.499,
                'longitude' => 117.134
            ],
            [
                'name' => 'Universitas Mulawarman',
                'image' => 'assets/img/user/universitas_mulawarman.jpg',
                'latitude' => -0.466,
                'longitude' => 117.157
            ],
            [
                'name' => 'Politeknik Negeri Samarinda',
                'image' => 'assets/img/user/politeknik_samarinda.jpg',
                'latitude' => -0.475,
                'longitude' => 117.160
            ],
            [
                'name' => 'Politeknik Industri Logam Morowali',
                'image' => 'assets/img/user/politeknik_logam_morowali.jpg',
                'latitude' => -2.631,
                'longitude' => 121.356
            ],
            [
                'name' => 'Universitas Pattimura',
                'image' => 'assets/img/user/universitas_pattimura.jpg',
                'latitude' => -3.656,
                'longitude' => 128.194
            ],
            [
                'name' => 'RSUP Dr. Hasan Sadikin Bandung',
                'image' => 'assets/img/user/rsup_hasan_sadikin.jpg',
                'latitude' => -6.898,
                'longitude' => 107.610
            ],
            [
                'name' => 'Sekretariat Daerah Kab. Malang',
                'image' => 'assets/img/user/sekretariat_kab_malang.jpg',
                'latitude' => -7.977,
                'longitude' => 112.630
            ],
            [
                'name' => 'Politeknik Negeri Madiun',
                'image' => 'assets/img/user/politeknik_madiun.jpg',
                'latitude' => -7.630,
                'longitude' => 111.529
            ],
            [
                'name' => 'RSUD Daha Husada',
                'image' => 'assets/img/user/rsud_daha_husada.jpg',
                'latitude' => -7.093,
                'longitude' => 112.471
            ],
            [
                'name' => 'Politeknik Negeri Balikpapan',
                'image' => 'assets/img/user/politeknik_balikpapan.jpg',
                'latitude' => -1.267,
                'longitude' => 116.828
            ],
            [
                'name' => 'Dinas Koperasi Usaha Mikro Perindustrian dan Perdagangan Kab.Semarang',
                'image' => 'assets/img/user/dinas_koperasi_semarang.jpg',
                'latitude' => -7.002,
                'longitude' => 110.407
            ],
            [
                'name' => 'RSUD Prof Dr. Margono Soekarjo',
                'image' => 'assets/img/user/rsud_prof_dr_margono_soekarjo.jpg',
                'latitude' => -7.567,
                'longitude' => 109.221
            ],
            [
                'name' => 'Universitas Negeri Cendana',
                'image' => 'assets/img/user/universitas_negeri_cendana.jpg',
                'latitude' => -8.584,
                'longitude' => 122.639
            ],
            [
                'name' => 'UPN Veteran Jawa Timur',
                'image' => 'assets/img/user/upn_veteran_jawa_timur.jpg',
                'latitude' => -7.271,
                'longitude' => 112.737
            ],
            [
                'name' => 'Politeknik Negeri Banyuwangi',
                'image' => 'assets/img/user/politeknik_negeri_banyuwangi.jpg',
                'latitude' => -8.217,
                'longitude' => 114.241
            ],
            [
                'name' => 'Universitas Jember',
                'image' => 'assets/img/user/universitas_jember.jpg',
                'latitude' => -8.161,
                'longitude' => 113.704
            ],
            [
                'name' => 'POLTEKES KEMENKES Malang',
                'image' => 'assets/img/user/politekes_kemenkes_malang.jpg',
                'latitude' => -7.979,
                'longitude' => 112.634
            ],
        ]);
    }
}
