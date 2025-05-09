<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'price',
        'user_id'
    ];
    public function users(){
        return $this->hasMany(ServicePricing::class, 'service_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
