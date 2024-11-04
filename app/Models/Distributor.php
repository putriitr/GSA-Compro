<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'email',
        'no_telepon',
    ];

    public function userProduk()
    {
        return $this->hasMany(UserProduk::class); // Adjust class name if different
    }
}
