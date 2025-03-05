<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePricing extends Model
{
    protected $fillable = [
        'price',
        'service_id',
        'user_id'
    ];
}
