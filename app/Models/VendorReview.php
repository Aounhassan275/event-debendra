<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorReview extends Model
{
    protected $fillable = [
        'description',
        'rating',
        'vendor_id',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id');
    }
}
