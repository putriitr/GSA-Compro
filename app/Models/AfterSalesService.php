<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AfterSalesService extends Model
{
    use HasFactory;

    protected $table = 'after_sales_services'; // Nama tabel

    protected $fillable = [
        'judul', // Kolom judul
        'deskripsi', // Kolom deskripsi
        'image', // Kolom untuk path gambar
    ];
}

