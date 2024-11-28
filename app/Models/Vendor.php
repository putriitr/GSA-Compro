<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Quotation;
use App\Models\BidangPerusahaan;
use App\Models\UserProduk;
use App\Models\Location;
use App\Models\Produk;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Vendor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'nama_perusahaan',
        'bidang_perusahaan',
        'no_telp',
        'alamat',
        'bidang_id',
        'location_id',
        'pic',
        'nomor_telp_pic',
        'akta',
        'nib',
        'verified',
        'loa',
        'product_list',
        // 'price_list'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn($value) => ["member", "admin", "distributor"][$value] ?? "member",
        );
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }

    public function products()
    {
        return $this->hasMany(Produk::class);
    }
}
