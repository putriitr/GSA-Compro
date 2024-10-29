<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone_number',
        'company',
        'location',
        'date_of_purchase',
    ];
}
