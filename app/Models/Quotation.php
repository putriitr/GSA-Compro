<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Produk;

class Quotation extends Model
{
    use HasFactory;

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'user_id', 'produk_id', 'quantity', 'status'
    ];

    /**
     * Define relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define relationship with the Produk model.
     * Assuming 'produk_id' is the foreign key that links to the Produk model.
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
